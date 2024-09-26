<?php

namespace App\Livewire\Admin\Kriteria;

use App\Models\Kriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

    public $selectedData = [];
    public $selectAll = false;
    public $keyword = '';

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('selectall')]
    public function checkedAll()
    {
        if ($this->selectAll) {
            $this->selectedData = Kriteria::pluck('id')->toArray();
        } else {
            $this->selectedData = [];
        }
    }

    public function deleteSelected()
    {
        if (count($this->selectedData) > 0) {
            foreach ($this->selectedData as $id) {
                $kriteria = Kriteria::where('id', $id)->first();
                if ($kriteria) {
                    Kriteria::where('id', $kriteria->id)->delete();
                }
            }
            $this->alert('success', 'Kriteria berhasil dihapus');
            $this->dispatch('$refresh');
            $this->reset();
        } else {
            $this->alert('info', 'Pilih data yang akan dihapus');
        }
    }

    public function dataEdit($id)
    {
        $this->dispatch('dataEdit', $id);
    }

    public function delete($id)
    {
        $this->confirm('Are you sure you want to delete this data?', [
            'position' =>  'center',
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'inputAttributes' => $id,
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function confirmed($data)
    {
        $kriteria = Kriteria::where('id', $data['inputAttributes'])->first();
        if ($kriteria) {
            Kriteria::where('id', $kriteria->id)->delete();

            $this->alert('success', 'Kriteria berhasil dihapus');
            $this->dispatch('$refresh');
        } else {
            $this->alert('error', 'Kriteria gagal dihapus');
        }
    }

    public function cancelled()
    {
        $this->alert('info', 'Wisata batal dihapus');
    }


    #[On('refreshData')]
    public function refreshData()
    {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $kriteria = Kriteria::Where('name', 'like', '%' . $this->keyword . '%')
            ->orWhere('type', 'like', '%' . $this->keyword . '%')
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('livewire.admin.kriteria.show', compact('kriteria'));
    }
}
