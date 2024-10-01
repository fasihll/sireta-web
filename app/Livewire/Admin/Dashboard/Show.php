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
        $wp = WpServices::calculateWPWithNormalization();
        $kriteria = Kriteria::all();
        $wisata = Wisata::all();
        $users = User::all();
        $wisataByCategory = Category::with('wisatas')->get();
        return view('livewire.admin.dashboard.show', compact('wp', 'kriteria', 'wisata', 'weightBeforeNormalization', 'perbandinganBerpasangan', 'users', 'wisataByCategory'));
    }
}
