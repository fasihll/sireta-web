<?php

namespace App\Livewire\Admin\Perhitungan;

use App\Models\Kriteria;
use App\Models\PerbandinganBerpasangan;
use App\Models\Wisata;
use App\Services\WpServices;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $weightBeforeNormalization = PerbandinganBerpasangan::pluck('wights')->toArray();
        $wp = WpServices::calculateWPWithNormalization();
        $kriteria = Kriteria::all();
        $wisata = Wisata::all();
        return view('livewire.admin.perhitungan.show', compact('wp', 'weightBeforeNormalization', 'kriteria', 'wisata'));
    }
}
