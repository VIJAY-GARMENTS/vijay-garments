<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upsert extends Component
{
    use WithFileUploads;

    public mixed $vid = '';
    public string $title;
    public string $body;
    public $image;
    public string $user_id;

    public function mount($id)
    {
        if ($id != 0) {
            $post = Post::find($id);
            $this->vid = $post->id;
            $this->title = $post->title;
            $this->body = $post->body;
            $this->image = $post->image;
            $this->user_id = $post->user_id;

        }


    }

    public function save()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                Post::create([
                    'title' => $this->title,
                    'body' => $this->body,
                    'image' => $this->save_image(),
                    'user_id' => \Auth::id(),
                ]);
                $this->getRoute();
            } else {
                $post = Post::find($this->vid);
                $post->title = $this->title;
                $post->body = $this->body;
                if ($post->image!=$this->image){
                $post->image = $this->save_image();
                }else{
                    $post->image=$this->image;
                }

                $post->user_id = \Auth::id();
                $post->save();

                $this->redirect(route('posts'));

            }
        }

    }

    public function save_image()
    {
            return $this->image->store('photos','public');
    }


    public function getRoute(): void
    {

        $this->redirect(route('posts'));
    }


    public function render()
    {
        return view('livewire.blog.post.upsert')->layout('layouts.web');
    }
}
