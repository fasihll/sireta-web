<?php

namespace App\Services;

use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\PerbandinganBerpasangan;
use App\Models\Wisata;

/**
 * Class WpServices.
 */
class WpServices
{
  function calculateWPWithNormalization()
  {
    // Ambil hasil AHP (bobot) dari tabel PerbandinganBerpasangan
    $ahpResult = PerbandinganBerpasangan::first(); // Sesuaikan jika ada banyak data
    $weights = json_decode($ahpResult->weights, true); // Bobot dari AHP

    // Ambil semua alternatif (wisata) dan kriteria
    $wisataList = Wisata::all();
    $kriteriaList = Kriteria::all();

    // Inisialisasi array untuk menyimpan nilai WP (S) dan Vektor V untuk setiap alternatif
    $wpResults = [];
    $totalS = 0;

    // Looping untuk setiap wisata
    foreach ($wisataList as $wisata) {
      $wpValue = 1;

      // Iterasi setiap kriteria untuk menghitung WP
      foreach ($kriteriaList as $index => $kriteria) {
        // Ambil nilai kriteria untuk semua alternatif pada kriteria ini untuk keperluan normalisasi
        $alternatifKriteriaValues = AlternatifKriteria::where('kriteria_id', $kriteria->id)->pluck('value');

        // Hitung nilai min dan max dari nilai kriteria tersebut
        $minValue = $alternatifKriteriaValues->min();
        $maxValue = $alternatifKriteriaValues->max();

        // Ambil nilai kriteria untuk alternatif wisata dari tabel AlternatifKriteria
        $alternatifKriteria = AlternatifKriteria::where('wisata_id', $wisata->id)
          ->where('kriteria_id', $kriteria->id)
          ->first();

        if ($alternatifKriteria) {
          $kriteriaValue = $alternatifKriteria->value;

          // Normalisasikan nilai kriteria dengan Min-Max (skala 1-5)
          $normalizedValue = (($kriteriaValue - $minValue) / ($maxValue - $minValue)) * (5 - 1) + 1;

          // Jika kriteria bertipe benefit, pangkatkan dengan bobot; jika cost, pangkat negatif
          if ($kriteria->type == 'benefit') {
            $wpValue *= pow($normalizedValue, $weights[$index]);
          } else if ($kriteria->type == 'cost') {
            $wpValue *= pow($normalizedValue, -$weights[$index]);
          }
        }
      }

      // Simpan hasil WP (S) untuk alternatif ini dan hitung total S
      $wpResults[$wisata->id] = $wpValue;
      $totalS += $wpValue;
    }

    // Hitung Vektor V untuk setiap wisata
    $vektorV = [];
    foreach ($wpResults as $id => $S_value) {
      $vektorV[$id] = $S_value / $totalS;
    }

    return $vektorV; // Mengembalikan Vektor V sebagai hasil akhir
  }
}
