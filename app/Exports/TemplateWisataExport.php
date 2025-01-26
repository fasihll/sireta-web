<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TemplateWisataExport implements WithEvents, WithCustomStartCell
{
    private $categories;
    private $kriteria;

    public function __construct()
    {
        // Ambil data dari database
        $this->categories = Category::pluck('name')->toArray();
        $this->kriteria = Kriteria::pluck('name')->toArray();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                /** @var Worksheet $sheet */
                $sheet = $event->sheet->getDelegate();

                // Header kolom
                $headers = [
                    'No',
                    'Image',
                    'Name',
                    'Description',
                    'Category',
                ];

                // Tambahkan kolom Kriteria
                foreach ($this->kriteria as $kriteria) {
                    $headers[] = $kriteria;

                    // Jika kriteria adalah "Fasilitas", tambahkan kolom Keterangan
                    if ($kriteria === 'Fasilitas') {
                        $headers[] = 'Keterangan';
                    }
                }

                // Tambahkan kolom terakhir
                $headers[] = 'Alamat';
                $headers[] = 'LatLng';

                // Isi header
                $sheet->fromArray($headers, null, 'A1');

                // Style header: Biru dengan teks putih
                $sheet->getStyle('A1:' . chr(64 + count($headers)) . '1')->applyFromArray([
                    'font' => [
                        'color' => ['rgb' => Color::COLOR_WHITE],
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '0000FF'], // Warna biru
                    ],
                ]);

                // Isi satu data di baris kedua
                $sheet->setCellValue('A2', 1); // No
                $sheet->setCellValue('B2', 'dikosongi'); // Image
                $sheet->setCellValue('C2', 'nama Wisata'); // Name
                $sheet->setCellValue('D2', 'Deskripsi'); // Description
                $sheet->setCellValue('E2', 'Wisata Alam'); // Isi default dengan salah satu kategori
                // Isi data kriteria dan keterangan (jika ada)
                $currentColumn = 6; // Mulai dari kolom F
                foreach ($this->kriteria as $kriteria) {
                    $sheet->setCellValueByColumnAndRow($currentColumn, 2, rand(1, 5)); // Contoh nilai kriteria

                    if ($kriteria === 'Fasilitas') {
                        $currentColumn++;
                        $sheet->setCellValueByColumnAndRow($currentColumn, 2, 'toilet, parkir'); // Keterangan untuk Fasilitas
                    }
                    $currentColumn++;
                }

                // Isi kolom Alamat dan LatLng di belakang
                $sheet->setCellValueByColumnAndRow($currentColumn, 2, 'Jl. Contoh Alamat'); // Alamat
                $currentColumn++;
                $sheet->setCellValueByColumnAndRow($currentColumn, 2, '-7.2575,112.7521'); // LatLng

                // Tambahkan dropdown untuk kolom Category (E)
                foreach (range(2, 100) as $row) { // Range dropdown di baris 2-100
                    $validation = $sheet->getCell("E{$row}")->getDataValidation();
                    $validation->setType(DataValidation::TYPE_LIST);
                    $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
                    $validation->setAllowBlank(true);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setFormula1('"' . implode(',', $this->categories) . '"');
                }
            },
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }
}
