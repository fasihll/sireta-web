<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;

class ComparisonMatrixImport implements ToArray
{
    /**
     * @param Collection $collection
     */
    public function array(array $array): array
    {
        // Ambil data tanpa header (abaikan baris pertama dan kolom pertama)
        $filteredMatrix = array_filter($array, function ($row, $index) {
            return strtolower(trim($row[0])) !== 'total'; // Abaikan baris 'Total'
        }, ARRAY_FILTER_USE_BOTH);

        // Hapus kolom pertama (judul kriteria)
        return array_map(function ($row) {
            return array_slice($row, 1);
        }, $filteredMatrix);
    }
}
