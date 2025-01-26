<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Kriteria;
use App\Models\Wisata;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class WisataImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Ambil semua kriteria dari tabel Kriteria
        $kriteriaMap = Kriteria::pluck('id', 'name')->toArray();
        $rowNumber = 0;


        try {
            foreach ($rows as $key => $row) {
                // Skip header row
                if ($key === 0) continue;

                $rowNumber = $key + 1;

                // Ambil atau buat categoryId dari tabel Category
                $category = Category::firstOrCreate(
                    ['name' => $row[4]]
                );


                // Buat data Wisata
                $wisata = Wisata::updateOrCreate(
                    ['name' => $row[2]], // Kondisi pencarian berdasarkan kolom Name
                    [
                        'description' => $row[3],         // Update atau set Description
                        'category_id' => $category->id,  // Update atau set Category
                    ]
                );


                // Masukkan nilai ke tabel alternatif_kriteria
                $columns = [
                    'Biaya' => 5,          // Kolom Biaya ada di index 5
                    'Fasilitas' => 6,      // Kolom Fasilitas ada di index 6
                    'Keterangan' => 7,     // Kolom Keterangan ada di index 7
                    'Kondisi Jalan' => 8,  // Kolom Kondisi Jalan ada di index 8
                    'Keamanan' => 9,       // Kolom Keamanan ada di index 9
                    'Kebersihan' => 10,    // Kolom Kebersihan ada di index 10
                    'Alamat' => 11,        // Kolom Alamat ada di index 11
                    'LatLng' => 12,
                ];

                foreach ($columns as $kriteriaName => $index) {
                    if (isset($kriteriaMap[$kriteriaName])) {

                        $keterangan = ($kriteriaName === 'Fasilitas') ? $row[7] : null;

                        $wisata->alternatifKriteria()->updateOrCreate(
                            [
                                'kriteria_id' => $kriteriaMap[$kriteriaName], // Kondisi pencarian berdasarkan kriteria_id
                                'wisata_id' => $wisata->id,                  // Kondisi pencarian berdasarkan wisata_id
                            ],
                            [
                                'value' => $row[$index], // Update atau set nilai Value
                                'keterangan' => $keterangan, // Update atau set nilai Keterangan
                                'alamat' => $row[11],
                                'latlng' => $row[12]
                            ]
                        );
                    }
                }
            }
        } catch (\Throwable $th) {
            throw new \Exception(" error di excel baris ke " . $rowNumber . ". Tolong delete row baris excel yang tidak terpakai !!");
        }
    }
}
