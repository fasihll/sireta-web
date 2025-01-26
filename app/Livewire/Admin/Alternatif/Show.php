<?php

namespace App\Livewire\Admin\Alternatif;

use App\Exports\TemplateWisataExport;
use App\Imports\WisataImport;
use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads as SupportFileUploadsWithFileUploads;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Boolean;

class Show extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;
    use SupportFileUploadsWithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $selectedData = [];
    public $selectAll = false;
    public $keyword = '';
    public $excelFile;

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

    public function deleteSelected()
    {
        if (count($this->selectedData) > 0) {
            foreach ($this->selectedData as $id) {
                $wisata = Wisata::where('id', $id)->first();
                if ($wisata) {
                    if ($wisata->image != null) {
                        Storage::delete('images/' . $wisata->image);
                    }
                    Wisata::where('id', $wisata->id)->delete();
                }
            }
            $this->alert('success', 'Wisata berhasil dihapus');
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

    public function importExcel()
    {
        $this->validate([
            'excelFile' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ]);
        // dd($this->excelFile->getRealPath());
        try {
            Excel::import(new WisataImport, $this->excelFile->getRealPath());
            $this->alert('success', 'Wisata berhasil di Import');
        } catch (\Exception $e) {
            $this->alert('error', 'Wisata gagal di Import' . $e->getMessage());
        }

        $this->reset('excelFile');
    }

    public function downloadTemplate()
    {
        return Excel::download(new TemplateWisataExport(), 'Template_Format_DataWisata.xlsx');
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
