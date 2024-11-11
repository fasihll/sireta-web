<?php

namespace App\Livewire\Landing;

use App\Models\Category;
use App\Models\Wisata;
use App\Services\WpServices;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;

    public $selected_wisata = [] ?? null;
    // public $latlng;
    public $categorySelected = 1;

    #[Layout('layouts.landing')]
    public function render()
    {
        $rekomendasi = WpServices::calculateWPWithNormalization()['sorted_wisata'];
        $category = Category::all();
        $alldata = Wisata::with('category', 'alternatifKriteria.kriteria', 'feedbacks')
            ->whereHas('category', function ($query) {
                $query->where('id', $this->categorySelected);
            })
            ->paginate(10);
        return view('livewire.landing.home', compact('rekomendasi', 'category', 'alldata'));
    }

    public function updateCategorySelected($categoryId)
    {
        $this->categorySelected = $categoryId;
    }

    public function setSelectedData($index)
    {
        $this->selected_wisata = WpServices::calculateWPWithNormalization()['sorted_wisata'][$index]->toArray();

        $latlng = $this->selected_wisata['alternatif_kriteria'][0]['latlng'];
        if ($latlng != null) {
            list($latitude, $longitude) = explode(',', $latlng);
            $this->dispatch('updateMaps', lat: $latitude, lng: $longitude, name: $this->selected_wisata['name'], alamat: $this->selected_wisata['alternatif_kriteria'][0]['alamat']);
        } else {
            $this->dispatch('updateMaps', lat: -0000, lng: 0000, name: $this->selected_wisata['name'], alamat: $this->selected_wisata['alternatif_kriteria'][0]['alamat']);
        }
    }

    public function setSelectedDataAll($id)
    {
        $this->selected_wisata = Wisata::with('category', 'alternatifKriteria.kriteria', 'feedbacks')
            ->where('id', $id)
            ->first()->toArray();
        // dd($this->selected_wisata);
        $latlng = $this->selected_wisata['alternatif_kriteria'][0]['latlng'];
        if ($latlng != null) {
            list($latitude, $longitude) = explode(',', $latlng);
            $this->dispatch('updateMaps', lat: $latitude, lng: $longitude, name: $this->selected_wisata['name'], alamat: $this->selected_wisata['alternatif_kriteria'][0]['alamat']);
        } else {
            $this->dispatch('updateMaps', lat: -0000, lng: 0000, name: $this->selected_wisata['name'], alamat: $this->selected_wisata['alternatif_kriteria'][0]['alamat']);
        }
    }
}
