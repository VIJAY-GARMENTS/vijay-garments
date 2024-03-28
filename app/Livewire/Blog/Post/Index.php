<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
//    public Collection $user;
//    public $user_id;
//
//    public function getUser()
//    {
//        $this->user=User::all();
//    }
    public function create(): void
    {
        $this->redirect(route('posts.upsert', ['0']));
    }

//    public function getobj($id)
//    {
//        if ($id){
//            $obj=Post::find($id);
//            $this->vid = $obj->id;
//            $this->title = $obj->title;
//            $this->body = $obj->body;
//            $this->image = $obj->image;
//            $this->user_id = $obj->user_id;
//            $this->user_name= $obj->user->name;
//
//            return $obj;
//        }
//    }
    public function render()
    {
//        $this->getUser();
        return view('livewire.blog.post.index')->layout('layouts.web')->with([
            'list' => Post::all()
        ]);
    }
}
