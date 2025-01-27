<?php

namespace App\Livewire\Admin\Alternatif;

use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;
    use LivewireAlert;

    #[Validate('nullable|image|max:2048')]
    public $image;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $description;

    #[Validate('required')]
    public $category;


    public function store()
    {

        if ($this->validate()) {
            $this->alert('error', 'Wisata gagal ditambahkan');
        }
        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category
        ];

        if ($this->image != null) {
            $this->image->storeAs('images', $this->image->hashName());

            $data['image'] = $this->image->hashName();
        }

        if (Wisata::create($data)) {
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
        return view('livewire.admin.alternatif.create', compact('categorys'));
    }
}
