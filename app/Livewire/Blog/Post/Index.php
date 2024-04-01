<?php

namespace App\Livewire\Blog\Post;

use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user_id;
    public function mount()
    {
        if (Auth::user()!=''){
            $this->user_id=Auth::user()->id;
        }
    }
    public function create(): void
    {
        $this->redirect(route('posts.upsert', ['0']));
    }

    public function render()
    {
        return view('livewire.blog.post.index')->layout('layouts.web')->with([
            'list' => Post::all()
            ->when($this->user_id,function ($query,$user_id) {
                return $query->where('user_id', '=', $user_id);
            })
        ]);

    }
}
