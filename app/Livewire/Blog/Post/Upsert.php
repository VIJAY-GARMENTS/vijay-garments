<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use FontLib\TrueType\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upsert extends Component
{
    use WithFileUploads;

    public mixed $vid = '';
    public string $title;
    public string $body;
    public string $user_id;
    public $image;

    public function mount($id)
    {
        if ($id != 0) {
            $post = Post::find($id);
            $this->vid = $post->id;
            $this->title = $post->title;
            $this->body = $post->body;
            $this->user_id = $post->user_id;
            $this->image = $post->image;

        }


    }

    public function save()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                Post::create([
                    'title' => $this->title,
                    'body' => $this->body,
                    'user_id' => \Auth::id(),
                    'image' => $this->save_image(),
                ]);
                $this->getRoute();
            } else {
                $post = Post::find($this->vid);
                $post->title = $this->title;
                $post->body = $this->body;
                $post->user_id = \Auth::id();
                $post->image = $this->save_image();
                $post->save();

                $this->redirect(route('posts'));

            }
        }

    }

    public function save_image()
    {
//        return $this->image = \File::allFiles(public_path('images'));
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
