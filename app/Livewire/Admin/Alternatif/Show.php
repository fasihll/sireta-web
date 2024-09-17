<?php

namespace App\Livewire\Admin\Alternatif;

use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Boolean;

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
            $this->selectedData = Wisata::pluck('id')->toArray();
        } else {
            $this->selectedData = [];
        }
    }

    public function dataEdit($id)
    {
        $this->dispatch('dataEdit', $id);
    }

    public function delete($id)
    {
        $this->alert('warning', 'Alert with deny and cancel button', [
            'position' =>  'center',
            'toast' => false,
            'text' => 'Are you sure you want to delete this data?',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmed',
            'inputAttributes' => $id,
            'onDismissed' => 'cancelled',
        ]);
    }

    public function confirmed($data)
    {
        $wisata = Wisata::where('id', $data['inputAttributes'])->first();
        if ($wisata) {
            if ($wisata->image != null) {
                Storage::delete('images/' . $wisata->image);
            }
            Wisata::where('id', $wisata->id)->delete();

            $this->alert('success', 'Wisata berhasil dihapus');
            $this->dispatch('$refresh');
        } else {
            $this->alert('error', 'Wisata gagal dihapus');
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
        $wisata = Wisata::with('category')
            ->whereHas('category', function ($query) {
                $query->where('name', 'like', '%' . $this->keyword . '%');
            })
            ->orWhere('name', 'like', '%' . $this->keyword . '%')
            ->orderBy('id', 'DESC')
            ->paginate(6);

        $category = Category::all();
        return view('livewire.admin.alternatif.show', compact('wisata', 'category'));
    }
}
