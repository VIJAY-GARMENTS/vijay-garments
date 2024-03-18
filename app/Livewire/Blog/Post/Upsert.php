<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use Livewire\Component;

class Upsert extends Component
{

    public mixed $vid;
    public string $title;
    public string $body;

    public function mount($id)
    {
        if ($id) {
            $post = Post::find($id);
            $this->vid = $post->id;
            $this->title = $post->title;
            $this->body = $post->body;

        }


    }

    public function save()
    {
        $post = Post::find($this->vid);
        $post->title = $this->title;
        $post->body = $this->body;
        $post->save();

        $this->redirect(route('posts'));

    }


    public function render()
    {
        return view('livewire.blog.post.upsert')->layout('layouts.web');
    }
}
