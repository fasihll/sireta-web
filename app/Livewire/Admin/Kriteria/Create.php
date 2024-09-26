<?php

namespace App\Livewire\Admin\Kriteria;

use App\Models\Kriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $name;

    #[Validate('nullable|numeric')]
    public $bobot;

    #[Validate('required|in:cost,benefit')]
    public $type;

    public function store()
    {

        if ($this->validate()) {
            $this->alert('error', 'Kriteria gagal ditambahkan');
        }
        $data = [
            'name' => $this->name,
            'bobot' => $this->bobot,
            'type' => $this->type
        ];

        if (Kriteria::create($data)) {
            $this->alert('success', 'Kriteria berhasil ditambahkan');
            $this->reset();
            // redirect()->route('alternatif');
            $this->dispatch('refreshData');
        } else {
            $this->alert('error', 'Kriteria gagal ditambahkan');
        }
    }

    public function render()
    {
        return view('livewire.admin.kriteria.create');
    }
}
