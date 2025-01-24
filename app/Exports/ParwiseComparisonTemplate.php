<?php

namespace App\Exports;

use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ParwiseComparisonTemplate implements FromCollection, WithHeadings, WithStyles
{
    /**
     * Generate the header row for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        // Ambil nama kriteria untuk header
        $kriteria = Kriteria::pluck('name')->toArray();

        // Tambahkan kolom pertama kosong untuk nama baris
        return array_merge(['-'], $kriteria);
    }

    /**
     * Generate the data for the Excel file.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Ambil semua kriteria
        $kriteria = Kriteria::all();

        // Buat matriks pairwise comparison
        $rows = $kriteria->map(function ($criterion) use ($kriteria) {
            $row = [$criterion->name]; // Kolom pertama adalah nama kriteria

            foreach ($kriteria as $comparedCriterion) {
                // Jika kriteria sama, beri nilai 1, jika tidak, beri nilai kosong
                $row[] = $criterion->id === $comparedCriterion->id ? 1 : '';
            }

            return $row;
        });

        return collect($rows);
    }

    public function styles(Worksheet $sheet)
    {
        $kriteriaCount = Kriteria::count();
        $lastColumn = chr(64 + $kriteriaCount + 1); // Kolom terakhir berdasarkan jumlah kriteria
        $lastRow = $kriteriaCount + 1; // Baris terakhir

        // Gaya untuk header (baris pertama)
        $sheet->getStyle("A1:{$lastColumn}1")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'], // Warna font putih
            ],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => '4CAF50'], // Warna hijau untuk header
            ],
        ]);

        // Gaya untuk kolom pertama
        $sheet->getStyle("A1:A{$lastRow}")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'], // Warna font putih
            ],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => '4CAF50'], // Warna kuning untuk kolom pertama
            ],
        ]);

        // Gaya untuk diagonal utama
        foreach (range(2, $lastRow) as $row) {
            $column = chr(64 + ($row));
            $sheet->getStyle("$column$row")->applyFromArray([
                'fill' => [
                    'fillType' => 'solid',
                    'color' => ['rgb' => 'FFEB3B'], // Warna kuning untuk diagonal utama
                ],
            ]);
        }

        return [];
    }
}
