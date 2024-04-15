<?php

namespace App\Livewire\Blog\Post;

use Aaran\Blog\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $company_id;

    public function mount()
    {
        if (Auth::user() != '') {
            $this->company_id = session()->get('company_id');
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
                ->when($this->company_id, function ($query, $company_id) {
                    return $query->where('company_id', '=', $company_id);
                })
        ]);

    }
}
