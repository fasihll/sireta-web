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
    $wpDetails = [];
    $vektorV = [];
    $decisionMatrix = []; // Matriks Keputusan
    $normalizedMatrix = []; // Matriks Keputusan Ter-normalisasi
    $totalS = 0;

    // Looping untuk setiap wisata
    foreach ($wisataList as $wisata) {
      $wpValue = 1; // Reset setiap iterasi wisata
      $wpDetails[$wisata->id] = []; // Simpan detail perhitungan setiap kriteria

      // Iterasi setiap kriteria untuk menghitung WP
      foreach ($kriteriaList as $index => $kriteria) {
        // Ambil nilai kriteria untuk semua alternatif pada kriteria ini untuk keperluan normalisasi
        $alternatifKriteriaValues = AlternatifKriteria::where('kriteria_id', $kriteria->id)->pluck('value');

        // Pastikan tidak kosong
        if ($alternatifKriteriaValues->isEmpty()) {
          continue; // Lewati jika tidak ada nilai untuk kriteria ini
        }

        // Ambil nilai kriteria untuk alternatif wisata dari tabel AlternatifKriteria
        $alternatifKriteria = AlternatifKriteria::where('wisata_id', $wisata->id)
          ->where('kriteria_id', $kriteria->id)
          ->first();

        // Pastikan alternatif kriteria tidak null
        if (!$alternatifKriteria) {
          continue; // Lewati jika tidak ada nilai untuk kombinasi wisata-kriteria ini
        }

        $kriteriaValue = $alternatifKriteria->value;

        // Jika nilai 0, ubah menjadi 0.01 agar tidak menyebabkan error dalam perhitungan WP
        $normalizedValue = ($kriteriaValue == 0) ? 0.01 : $kriteriaValue;

        // Simpan ke matriks keputusan
        $decisionMatrix[$wisata->id][$kriteria->id] = $kriteriaValue;

        // Simpan ke matriks normalisasi
        $normalizedMatrix[$wisata->id][$kriteria->id] = $normalizedValue;

        // Hitung WP berdasarkan tipe kriteria
        if (isset($wights[$index])) {
          if ($kriteria->type == 'benefit') {
            $criteriaResult = pow($normalizedValue, $wights[$index]);
          } elseif ($kriteria->type == 'cost') {
            $criteriaResult = pow($normalizedValue, -$wights[$index]);
          } else {
            $criteriaResult = $normalizedValue; // Jika tidak ada tipe, gunakan nilai asli
          }

          // Simpan hasil perhitungan per kriteria (tidak merusak iterasi lainnya)
          $wpDetails[$wisata->id][$kriteria->id] = sprintf("%.9f", $criteriaResult);

          // Kalikan dengan WP (S) setelah semua kriteria dihitung
          $wpValue *= $criteriaResult;
        }
      }

      // Simpan hasil WP (S) untuk alternatif ini
      $wpResults[$wisata->id] = sprintf("%.9f", $wpValue);
      $totalS += $wpValue;
    }

    // Hitung Vektor V untuk setiap wisata
    foreach ($wpResults as $id => $S_value) {
      $vektorV[$id] = sprintf("%.9f", $S_value / $totalS);
    }

    // Panggil fungsi untuk mengurutkan wisata berdasarkan Vektor V
    $sortedWisata = self::sortWisataByVektorV($vektorV);

    // Mengembalikan hasil berupa bobot, matriks keputusan, normalisasi, S, dan V, serta wisata yang sudah diurutkan
    return [
      'wights' => $wights, // Bobot Kriteria
      'decision_matrix' => $decisionMatrix, // Matriks Keputusan
      'normalized_matrix' => $normalizedMatrix, // Matriks Keputusan Ter-normalisasi
      'wp_details' => $wpDetails, // Detail WP
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
