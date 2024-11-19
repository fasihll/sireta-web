<?php

namespace App\Livewire\Admin\Result;

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
        if (empty($weightBeforeNormalization)) {
            $wp = null; // Set WP to null if no weights are found
        } else {
            // Perform WP calculation only if weights are available
            $wp = WpServices::calculateWPWithNormalization($weightBeforeNormalization);
        }
        $kriteria = Kriteria::all();
        $wisata = Wisata::all();
        $alternatifkriteria = Wisata::with('alternatifKriteria.kriteria')->get();
        $haveNull = false;

        foreach ($alternatifkriteria as $a) {
            if ($a->alternatifKriteria->isEmpty()) {
                $haveNull = true;
                break; // No need to check further once we find an empty relationship
            }
        }
        return view('livewire.admin.result.show', compact('wp', 'weightBeforeNormalization', 'kriteria', 'wisata', 'haveNull'));
    }
}
