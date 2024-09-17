<?php

namespace App\Livewire\Landing;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout('layouts.landing')]
    public function render()
    {
        return view('livewire.landing.home');
    }
}
