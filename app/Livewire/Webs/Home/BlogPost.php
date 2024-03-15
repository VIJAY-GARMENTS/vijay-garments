<?php

namespace App\Livewire\Webs\Home;

use Livewire\Component;

class BlogPost extends Component
{
    public function render()
    {
        return view('livewire.webs.home.blog-post')->layout('layouts.web');
    }
}
