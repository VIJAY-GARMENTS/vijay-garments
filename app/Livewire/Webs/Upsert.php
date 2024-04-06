<?php

namespace App\Livewire\Webs;

use Livewire\Component;

class Upsert extends Component
{
    public function render()
    {
        return view('livewire.webs.upsert')->layout('layouts.web')->with([
            'list'=>\App\Models\DemoRequest::all()
        ]);
    }
}
