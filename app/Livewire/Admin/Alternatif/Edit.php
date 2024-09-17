<?php

namespace App\Livewire\Admin\Alternatif;

use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;
    use LivewireAlert;
    public $id;
    #[Validate('nullable|image|max:1024')]
    public $image;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $description;

    #[Validate('required')]
    public $category;


    #[On('dataEdit')]
    public function newSelectedData($id)
    {
        $data = Wisata::find($id);
        $this->id = $id ?? null;
        $this->image = $data->image ?? null;
        $this->name = $data->name ?? null;
        $this->description = $data->description ?? null;
        $this->category = $data->category_id ?? null;
    }


    public function update()
    {

        if ($this->validate()) {
            $this->alert('error', 'Wisata gagal ditambahkan');
        }
        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category
        ];

        // dd($this->image);
        if ($this->image != null || $this->image != '') {
            $oldImageName = Wisata::find($this->id)->image;
            Storage::delete('images/' . $oldImageName);

            $this->image->storeAs('images', $this->image->hashName());
            $data['image'] = $this->image->hashName();
        }

        if (Wisata::where('id', $this->id)->update($data)) {
            $this->alert('success', 'Wisata berhasil ditambahkan');
            $this->reset();
            // redirect()->route('alternatif');
            $this->dispatch('refreshData');
        } else {
            $this->alert('error', 'Wisata gagal ditambahkan');
        }
    }

    public function render()
    {
        $categorys = Category::all();
        return view('livewire.admin.alternatif.edit', compact('categorys'));
    }
}
