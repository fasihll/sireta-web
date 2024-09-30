<?php

namespace App\Livewire\Admin\Penilaian;

use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\Wisata;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    use LivewireAlert;

    public $kriteria;
    public $alternatif;
    public $alternatifWithMultipleEntries;


    public $alternatif_id;
    public $value = [];

    protected $rules = [
        'alternatif_id' => 'required',
        'value.*' => 'required|numeric', // Pastikan value adalah angka
    ];

    public function mount()
    {
        $this->kriteria = Kriteria::all();
        $this->alternatif = Wisata::all();

        // Ambil semua alternatif yang memiliki lebih dari satu entri di AlternatifKriteria
        $this->alternatifWithMultipleEntries = AlternatifKriteria::select('wisata_id')
            ->groupBy('wisata_id')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('wisata_id');
    }
    public function store()
    {
        // dd([
        //     $this->alternatif_id,
        //     $this->value,
        // ]);
        $this->validate();

        // Simpan data untuk setiap kriteria
        try {
            foreach ($this->kriteria as $index => $item) {
                AlternatifKriteria::create([
                    'wisata_id' => $this->alternatif_id,
                    'kriteria_id' => $item->id,
                    'value' => $this->value[$index],
                ]);
            }
            $this->alert('success', 'Penilaian berhasil ditambahkan');
            $this->reset();
            $this->dispatch('refreshData');
        } catch (\Throwable $th) {
            $this->alert('error', 'Penilaian gagal ditambahkan ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.penilaian.create');
    }
}
