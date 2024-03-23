<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    public function create(): void
    {
        $this->redirect(route('posts.upsert', ['0']));
    }
    public function render()
    {
        return view('livewire.blog.post.index')->layout('layouts.web')->with([
            'list' => Post::all()
        ]);
    }
}
