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
        $rowNumber = 0;

        try {
            // Ambil header (baris pertama)
            $header = $rows->first()->toArray();

            // Ambil semua kriteria dari tabel Kriteria
            $kriteriaMap = Kriteria::pluck('id', 'name')->toArray();

            foreach ($rows as $key => $row) {
                // Skip header row
                if ($key === 0) continue;

                $rowNumber = $key + 1;

                // Ambil atau buat categoryId dari tabel Category
                $category = Category::firstOrCreate(['name' => $row[4]]);

                // Buat data Wisata
                $wisata = Wisata::updateOrCreate(
                    ['name' => $row[2]], // Kondisi pencarian berdasarkan kolom Name
                    [
                        'description' => $row[3],         // Update atau set Description
                        'category_id' => $category->id,  // Update atau set Category
                    ]
                );

                // Proses setiap kriteria berdasarkan header secara dinamis
                foreach ($header as $index => $kriteriaName) {
                    if (isset($kriteriaMap[$kriteriaName])) {
                        // Cek apakah kriteria adalah Fasilitas untuk menambahkan Keterangan
                        $keterangan = ($kriteriaName === 'Fasilitas') ? $row[7] : null;

                        $wisata->alternatifKriteria()->updateOrCreate(
                            [
                                'kriteria_id' => $kriteriaMap[$kriteriaName], // Kondisi pencarian berdasarkan kriteria_id
                                'wisata_id' => $wisata->id,                  // Kondisi pencarian berdasarkan wisata_id
                            ],
                            [
                                'value' => $row[$index] ?? null, // Update atau set nilai Value
                                'keterangan' => $keterangan,    // Update atau set nilai Keterangan
                            ]
                        );
                    }
                }

                // Masukkan Alamat dan LatLng di luar loop
                $wisata->update([
                    'alamat' => $row[11] ?? null,  // Kolom Alamat
                    'latlng' => $row[12] ?? null, // Kolom LatLng
                ]);
            }
        } catch (\Throwable $th) {
            throw new \Exception("Error di excel baris ke " . $rowNumber . ". Tolong delete row baris excel yang tidak terpakai !!");
        }
    }
}
