<?php

namespace App\Livewire\Landing;

use App\Services\WpServices;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{

    public $selected_wisata = [] ?? null;
    // public $latlng;

    #[Layout('layouts.landing')]
    public function render()
    {
        $rekomendasi = WpServices::calculateWPWithNormalization()['sorted_wisata'];
        return view('livewire.landing.home', compact('rekomendasi'));
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
}
