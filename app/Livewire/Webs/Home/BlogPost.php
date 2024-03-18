<?php

namespace App\Livewire\Webs\Home;

use Livewire\Component;

class BlogPost extends Component
{
    public function create()
    {
        $this->redirect(route("blogpost.newpost",['0']));

    }
    public function getList()
    {
       return \Blog\Blogpost\Model\Blogpost::all();
    }
    public function render()
    {
        return view('livewire.webs.home.blog-post')->layout('layouts.web')->with(['list'=>$this->getList()]);
    }
}
