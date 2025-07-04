<?php

namespace App\Livewire\Landing;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\PerbandinganBerpasangan;
use App\Models\Wisata;
use App\Services\WpServices;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;
    use LivewireAlert;

    public $selected_wisata = [] ?? null;
    public $categorySelected = 1;

    public $rating;
    public $feedback;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'feedback' => 'required|string|min:10',
    ];

    public function submitFeedback()
    {
        $this->validate();

        Feedback::create([
            'user_id' => Auth::user()->id,
            'wisata_id' => $this->selected_wisata['id'],
            'comment' => $this->feedback,
            'rating' => $this->rating,
        ]);

        // Tampilkan pesan sukses
        $this->alert('success', 'Feedback berhasil ditambahkan!');

        // Reset input form setelah submit
        $this->reset(['rating', 'feedback']);
    }

    public function deleteFeedback($id)
    {
        Feedback::find($id)->delete();
        $this->alert('success', 'Feedback berhasil dihapus!');
    }

    #[Layout('layouts.landing')]
    public function render()
    {
        $bobotahp = PerbandinganBerpasangan::first();

        if ($bobotahp && isset($bobotahp->wights)) {
            $rekomendasi = WpServices::calculateWPWithNormalization()['sorted_wisata'];
        } else {
            $rekomendasi = null;
        }

        // dd($rekomendasi);
        $category = Category::all();
        $alldata = Wisata::with('category', 'alternatifKriteria.kriteria', 'feedbacks')
            ->whereHas('category', function ($query) {
                $query->where('id', $this->categorySelected);
            })
            ->paginate(10); //dipanggil 10 rekoeendasi teratas

        $feedbackuser = Feedback::orWhere('wisata_id', $this->selected_wisata['id'] ?? null)
            ->where('user_id', Auth::user()->id ?? null)->first();
        $allFeedback = Feedback::with('user')->where('wisata_id', $this->selected_wisata['id'] ?? null)->get();
        $resumeRating = Feedback::where('wisata_id', $this->selected_wisata['id'] ?? null)->avg('rating');
        $countAndGroupByRating = Feedback::where('wisata_id', $this->selected_wisata['id'] ?? null)
            ->selectRaw('rating, count(*) as count')
            ->groupBy('rating')
            ->get();

        // Array rating yang ingin ditampilkan (1 - 5)
        $allRatings = [1, 2, 3, 4, 5];

        // Membuat array kosong untuk hasil yang telah digabungkan
        $ratingsWithCount = [];

        // Mengisi array dengan rating yang ada
        foreach ($allRatings as $rating) {
            // Cari rating yang sudah ada di database
            $existingRating = $countAndGroupByRating->firstWhere('rating', $rating);

            // Jika rating ditemukan, masukkan count-nya, jika tidak, set count = 0
            $ratingsWithCount[$rating] = $existingRating ? $existingRating->count : 0;
        }
        return view('livewire.landing.home', compact('rekomendasi', 'category', 'alldata', 'feedbackuser', 'allFeedback', 'resumeRating', 'ratingsWithCount'));
    }

    public function updateCategorySelected($categoryId)
    {
        $this->categorySelected = $categoryId;

        $this->resetPage();
    }

    public function setSelectedData($index)
    {
        $this->selected_wisata = WpServices::calculateWPWithNormalization()['sorted_wisata'][$index]->toArray();

        if (isset($this->selected_wisata['alternatif_kriteria'][0])) {
            $latlng = $this->selected_wisata['alternatif_kriteria'][0]['latlng'] ?? null;

            // Jika latlng tidak null, pisahkan menjadi latitude dan longitude
            if ($latlng != null) {
                if (isset($latlng) && strpos($latlng, ',') !== false) {
                    list($latitude, $longitude) = explode(',', $latlng);
                } else {
                    $latitude = null;
                    $longitude = null;
                }
                $this->dispatch('updateMaps', lat: $latitude, lng: $longitude, name: $this->selected_wisata['name'], alamat: $this->selected_wisata['alternatif_kriteria'][0]['alamat']);
            } else {
                // Jika latlng null, gunakan nilai default
                $this->dispatch('updateMaps', lat: 0.0000, lng: 0.0000, name: $this->selected_wisata['name'], alamat: $this->selected_wisata['alternatif_kriteria'][0]['alamat']);
            }
            // dd($this->selected_wisata);
        } else {
            // Jika alternatif_kriteria[0] tidak ada, gunakan nilai default untuk latlng
            $this->dispatch('updateMaps', lat: 0.0000, lng: 0.0000, name: $this->selected_wisata['name'], alamat: 'Alamat tidak tersedia');
        }
    }

    public function setSelectedDataAll($id)
    {
        $this->selected_wisata = Wisata::with('category', 'alternatifKriteria.kriteria', 'feedbacks')
            ->where('id', $id)
            ->first()->toArray();
        // dd($this->selected_wisata);
        if (isset($this->selected_wisata['alternatif_kriteria'][0])) {
            $latlng = $this->selected_wisata['alternatif_kriteria'][0]['latlng'] ?? null;
            $alamat = $this->selected_wisata['alternatif_kriteria'][0]['alamat'] ?? 'Alamat tidak tersedia';

            // Jika latlng ada, pisahkan menjadi latitude dan longitude
            if ($latlng != null) {
                list($latitude, $longitude) = explode(',', $latlng);
                $this->dispatch('updateMaps', lat: $latitude, lng: $longitude, name: $this->selected_wisata['name'], alamat: $alamat);
            } else {
                // Jika latlng null, gunakan nilai default untuk latlng
                $this->dispatch('updateMaps', lat: 0.0000, lng: 0.0000, name: $this->selected_wisata['name'], alamat: $alamat);
            }
        } else {
            // Jika alternatif_kriteria[0] tidak ada, kirimkan nilai default untuk latlng dan alamat
            $this->dispatch(
                'updateMaps',
                lat: 0.0000,
                lng: 0.0000,
                name: $this->selected_wisata['name'],
                alamat: 'Alamat tidak tersedia'
            );
        }
    }
}
