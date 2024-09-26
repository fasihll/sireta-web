<?php

namespace App\Livewire\Admin\Kriteria;

use App\Models\Kriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $id;
    #[Validate('required')]
    public $name;

    #[Validate('nullable|numeric')]
    public $bobot;

    #[Validate('required|in:cost,benefit')]
    public $type;

    #[On('dataEdit')]
    public function newSelectedData($id)
    {
        $data = Kriteria::find($id);
        $this->id = $id ?? null;
        $this->name = $data->name ?? null;
        $this->bobot = $data->bobot ?? null;
        $this->type = $data->type ?? null;
    }

    public function update()
    {

        if ($this->validate()) {
            $this->alert('error', 'Kriteria gagal ditambahkan');
        }
        $data = [
            'name' => $this->name,
            'bobot' => $this->bobot,
            'type' => $this->type
        ];

        if (Kriteria::where('id', $this->id)->update($data)) {
            $this->alert('success', 'Kriteria berhasil di edit');
            $this->reset();
            // redirect()->route('alternatif');
            $this->dispatch('refreshData');
        } else {
            $this->alert('error', 'Kriteria gagal di edit');
        }
    }

    public function render()
    {
        return view('livewire.admin.kriteria.edit');
    }
}
