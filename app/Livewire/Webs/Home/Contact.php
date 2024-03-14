<?php

namespace App\Livewire\Webs\Home;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.webs.home.contact')->layout('layouts.web');
    }
}
