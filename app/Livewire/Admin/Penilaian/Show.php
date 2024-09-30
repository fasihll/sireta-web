<?php

namespace App\Livewire\Admin\Penilaian;

use App\Models\AlternatifKriteria;
use App\Models\Wisata;
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
            $this->selectedData = AlternatifKriteria::pluck('id')->toArray();
        } else {
            $this->selectedData = [];
        }
    }

    public function deleteSelected()
    {
        if (count($this->selectedData) > 0) {
            foreach ($this->selectedData as $id) {
                $alternatifKriteria = AlternatifKriteria::where('id', $id)->first();
                if ($alternatifKriteria) {
                    AlternatifKriteria::where('id', $alternatifKriteria->id)->delete();
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
        $alternatifKriteria = AlternatifKriteria::where('id', $data['inputAttributes'])->first();
        if ($alternatifKriteria) {
            AlternatifKriteria::where('id', $alternatifKriteria->id)->delete();

            $this->alert('success', 'Data Penilaian berhasil dihapus');
            $this->dispatch('$refresh');
        } else {
            $this->alert('error', 'Data Penilaian gagal dihapus');
        }
    }

    public function cancelled()
    {
        $this->alert('info', 'Data Penilaian batal dihapus');
    }


    #[On('refreshData')]
    public function refreshData()
    {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $data = Wisata::with('alternatifKriteria.kriteria')
            ->where('name', 'like', '%' . $this->keyword . '%')
            ->paginate(6);

        return view('livewire.admin.penilaian.show', compact('data'));
    }
}
