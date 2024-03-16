<?php

namespace App\Livewire\Blogpost;

use Livewire\Component;

class Index extends Component
{
    public function create():void
    {
        $this->redirect(route("blogpost.upsert",['0']));
    }
    public function render()
    {
        return view('livewire.blogpost.index');
    }
}
