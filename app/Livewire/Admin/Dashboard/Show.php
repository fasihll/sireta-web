<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Category;
use App\Models\Kriteria;
use App\Models\PerbandinganBerpasangan;
use App\Models\User;
use App\Models\Wisata;
use App\Services\AhpServices;
use App\Services\WpServices;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $weightBeforeNormalization = PerbandinganBerpasangan::pluck('wights')->toArray();
        $perbandinganBerpasangan = PerbandinganBerpasangan::first();
        // If weights are not available, do not perform WP calculation
        if (empty($weightBeforeNormalization)) {
            $wp = null; // Set WP to null if no weights are found
        } else {
            // Perform WP calculation only if weights are available
            $wp = WpServices::calculateWPWithNormalization($weightBeforeNormalization);
        }
        $kriteria = Kriteria::all();
        $wisata = Wisata::all();
        $users = User::all();
        $wisataByCategory = Category::with('wisatas')->get();
        return view('livewire.admin.dashboard.show', compact('wp', 'kriteria', 'wisata', 'weightBeforeNormalization', 'perbandinganBerpasangan', 'users', 'wisataByCategory'));
    }
}
