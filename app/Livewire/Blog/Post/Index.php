<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.blog.post.index')->layout('layouts.web')->with([
            'list' => Post::all()
        ]);
    }
}
