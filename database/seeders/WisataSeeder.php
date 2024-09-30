<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wisata::create([
            'image' => '',
            'name' => 'Pantai Tegnket',
            'description' => ' Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'Makam Syaichona Cholil Bangkalan',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 2,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'Sinjay',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 3,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'pantai bitu',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'pantai tlangoh',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'pantai tenket',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'amboina',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 3,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'nyalete',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 3,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'bato pote',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'bujuk sara',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
        Wisata::create([
            'image' => '',
            'name' => 'bujuk langgundih',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, at saepe placeat vel sapiente consectetur ratione ut consequatur. Assumenda, cum.',
            'category_id' => 1,
        ]);
    }
}
