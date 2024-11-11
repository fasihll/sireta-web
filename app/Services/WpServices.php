<?php

namespace App\Services;

use App\Models\AlternatifKriteria;
use App\Models\Category;
use App\Models\Kriteria;
use App\Models\PerbandinganBerpasangan;
use App\Models\Wisata;

/**
 * Class WpServices.
 */
class WpServices
{
  public static function calculateWPWithNormalization()
  {
    // Ambil hasil AHP (bobot) dari tabel PerbandinganBerpasangan
    $ahpResult = PerbandinganBerpasangan::first(); // Sesuaikan jika ada banyak data
    if (!$ahpResult || !$ahpResult->wights) {
      throw new \Exception('Bobot AHP tidak ditemukan.');
    }

    $wights = json_decode($ahpResult->wights, true); // Bobot dari AHP
    if (is_null($wights)) {
      throw new \Exception('Bobot AHP tidak dapat di-decode.');
    }

    // Ambil semua alternatif (wisata) dan kriteria
    $wisataList = Wisata::all();
    $kriteriaList = Kriteria::all();

    // Inisialisasi array untuk menyimpan nilai WP (S), Vektor V, Matriks Keputusan dan normalisasi
    $wpResults = [];
    $vektorV = [];
    $decisionMatrix = []; // Matriks Keputusan
    $normalizedMatrix = []; // Matriks Keputusan Ter-normalisasi
    $totalS = 0;

    // Looping untuk setiap wisata
    foreach ($wisataList as $wisata) {
      $wpValue = 1;
      $decisionMatrix[$wisata->id] = []; // Buat entri untuk wisata ini di matriks keputusan
      $normalizedMatrix[$wisata->id] = []; // Buat entri untuk wisata ini di matriks normalisasi

      // Iterasi setiap kriteria untuk menghitung WP
      foreach ($kriteriaList as $index => $kriteria) {
        // Ambil nilai kriteria untuk semua alternatif pada kriteria ini untuk keperluan normalisasi
        $alternatifKriteriaValues = AlternatifKriteria::where('kriteria_id', $kriteria->id)->pluck('value');

        // Pastikan tidak kosong
        if ($alternatifKriteriaValues->isEmpty()) {
          continue; // Lewati jika tidak ada nilai untuk kriteria ini
        }

        // Hitung nilai min dan max dari nilai kriteria tersebut
        $minValue = $alternatifKriteriaValues->min();
        $maxValue = $alternatifKriteriaValues->max();

        // Ambil nilai kriteria untuk alternatif wisata dari tabel AlternatifKriteria
        $alternatifKriteria = AlternatifKriteria::where('wisata_id', $wisata->id)
          ->where('kriteria_id', $kriteria->id)
          ->first();

        // Pastikan alternatif kriteria tidak null
        if (!$alternatifKriteria) {
          continue; // Lewati jika tidak ada nilai untuk kombinasi wisata-kriteria ini
        }

        $kriteriaValue = $alternatifKriteria->value;

        // Simpan ke matriks keputusan
        $decisionMatrix[$wisata->id][$kriteria->id] = $kriteriaValue;

        // Normalisasikan nilai kriteria dengan Min-Max (skala 1-5)
        if ($maxValue != $minValue) {
          $normalizedValue = (($kriteriaValue - $minValue) / ($maxValue - $minValue)) * (5 - 1) + 1;
        } else {
          $normalizedValue = 1; // Jika semua nilai sama, normalisasi menjadi 1
        }

        $normalizedMatrix[$wisata->id][$kriteria->id] = $normalizedValue;

        // Jika kriteria bertipe benefit, pangkatkan dengan bobot; jika cost, pangkat negatif
        if (isset($wights[$index])) {
          if ($kriteria->type == 'benefit') {
            $wpValue *= pow($normalizedValue, $wights[$index]);
          } else if ($kriteria->type == 'cost') {
            $wpValue *= pow($normalizedValue, -$wights[$index]);
          }
        }
      }

      // Simpan hasil WP (S) untuk alternatif ini dan hitung total S
      $wpResults[$wisata->id] = $wpValue;
      $totalS += $wpValue;
    }

    // Hitung Vektor V untuk setiap wisata
    foreach ($wpResults as $id => $S_value) {
      $vektorV[$id] = $S_value / $totalS;
    }

    // Panggil fungsi untuk mengurutkan wisata berdasarkan Vektor V
    $sortedWisata = self::sortWisataByVektorV($vektorV);

    // Mengembalikan hasil berupa bobot, matriks keputusan, normalisasi, S, dan V, serta wisata yang sudah diurutkan
    return [
      'wights' => $wights, // Bobot Kriteria
      'decision_matrix' => $decisionMatrix, // Matriks Keputusan
      'normalized_matrix' => $normalizedMatrix, // Matriks Keputusan Ter-normalisasi
      'S' => $wpResults, // Vektor S
      'V' => $vektorV, // Vektor V
      'sorted_wisata' => $sortedWisata // Wisata yang sudah diurutkan
    ];
  }

  public static function sortWisataByVektorV($vektorV, $categoryId = null)
  {
    // Urutkan vektor V dari besar ke kecil
    arsort($vektorV);

    // Ambil ID wisata sesuai urutan dari vektor V
    $sortedWisataIds = array_keys($vektorV);

    // Query untuk ambil data wisata sesuai urutan
    $query = Wisata::with(['category', 'alternatifKriteria.kriteria', 'feedbacks']) // Pastikan relasi 'category' ada di model Wisata
      ->whereIn('id', $sortedWisataIds);

    // Jika categoryId disediakan, tambahkan kondisi untuk filter kategori
    if ($categoryId) {
      $query->where('category_id', $categoryId); // Sesuaikan nama kolom kategori sesuai schema Anda
    }

    // Ambil data wisata sesuai urutan
    $sortedWisata = $query->orderByRaw("FIELD(id, " . implode(',', $sortedWisataIds) . ")")->get();

    return $sortedWisata;
  }

  public static function getWisataGroupByCategory()
  {
    return Category::with('wisatas')->get();
  }
}
