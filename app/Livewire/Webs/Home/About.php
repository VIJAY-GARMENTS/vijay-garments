<?php

namespace App\Livewire\Webs\Home;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.webs.home.about')->layout('layouts.web');
    }
}
