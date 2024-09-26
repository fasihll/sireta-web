<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::create([
            'name' => 'Biaya',
            'type' => 'cost',
        ]);
        Kriteria::create([
            'name' => 'Fasilitas',
            'type' => 'benefit',
        ]);
        Kriteria::create([
            'name' => 'Kondisi Jalan',
            'type' => 'benefit',
        ]);
        Kriteria::create([
            'name' => 'Keamanan',
            'type' => 'benefit',
        ]);
        Kriteria::create([
            'name' => 'Kebersihan',
            'type' => 'benefit',
        ]);
    }
}
