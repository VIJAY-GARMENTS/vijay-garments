<?php

namespace App\Livewire\Blog\Post;

use App\Livewire\Trait\CommonTrait;
use App\Models\Blog\Post;
use Livewire\Component;

class View extends Component
{
    use CommonTrait;

    public Post $post;
    public function mount($id)
    {
        if ($id){
            $this->post=Post::find($id);
        }
    }
    public function render()
    {
        return view('livewire.blog.post.view')->layout('layouts.web');
    }
}
