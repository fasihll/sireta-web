<?php

namespace App\Livewire\Admin\Penilaian;

use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\Wisata;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;

    public $alternatif;

    public $alternatif_id;
    public $value = [];
    public $keterangan = [];
    public $alamat;
    public $latlng;

    protected $rules = [
        'alternatif_id' => 'required',
        'value.*' => 'required|numeric', // Pastikan value adalah angka
        'keterangan.*' => 'nullable', // Pastikan value adalah angka
        'alamat' => 'nullable', // Pastikan value adalah angka
        'latlng' => 'nullable', // Pastikan value adalah angka
    ];

    #[On('dataEdit')]
    public function newSelectedData($id)
    {
        $data = Wisata::with('alternatifKriteria.kriteria')->find($id);
        $this->alternatif = $data ?? null;
        $this->alternatif_id = $id ?? null;
        $this->value = $data->alternatifKriteria->pluck('value')->toArray() ?? null;
        $this->keterangan = $data->alternatifKriteria->pluck('keterangan')->toArray() ?? null;
        $this->alamat = $data->alternatifKriteria->pluck('alamat')->toArray()[0] ?? null;
        $this->latlng = $data->alternatifKriteria->pluck('latlng')->toArray()[0] ?? null;
    }

    public function update()
    {
        if ($this->validate()) {
            $this->alert('error', 'Kriteria gagal ditambahkan');
        }

        try {
            $kriteria = Kriteria::all();
            foreach ($kriteria as $index => $item) {
                AlternatifKriteria::updateOrCreate(
                    [
                        'wisata_id' => $this->alternatif_id,
                        'kriteria_id' => $item->id
                    ],
                    [
                        'value' => $this->value[$index],
                        'keterangan' => $this->keterangan[$index],
                        'alamat' => $this->alamat,
                        'latlng' => $this->latlng
                    ]
                );
            }
            $this->alert('success', 'Penilaian berhasil di edit');
            $this->reset();
            $this->dispatch('refreshData');
        } catch (\Throwable $th) {
            $this->alert('error', 'Penilaian gagal di edit ' . $th->getMessage());
        }
    }

    public function render()
    {
        $kriteria = Kriteria::all();
        return view('livewire.admin.penilaian.edit', compact('kriteria'));
    }
}
