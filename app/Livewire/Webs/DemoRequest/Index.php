<?php

namespace App\Livewire\Webs\DemoRequest;

use Aaran\Demo\Models\DemoRequest;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.webs.demo-request.index')->with([
            'list'=> DemoRequest::all()
        ]);
    }
}
