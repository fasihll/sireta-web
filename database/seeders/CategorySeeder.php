<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Wisata Alam',
            'description' => 'Tempat wisata Alam.'
        ]);
        Category::create([
            'name' => 'Wisata Religi',
            'description' => 'Tempat wisata Alam.'
        ]);
        Category::create([
            'name' => 'Wisata Kuliner',
            'description' => 'Tempat wisata Alam.'
        ]);
        Category::create([
            'name' => 'Wisata Budaya',
            'description' => 'Tempat wisata Alam.'
        ]);
    }
}
