<?php

namespace App\Livewire\Blogpost;

use Aaran\Master\Models\Company;
use Blog\Blogpost\Model\Blogpost;
use Livewire\Component;

class Upsert extends Component
{
   public function save():string
   {
               Blogpost::create([
                   'title' => Str::ucfirst($this->title),
                   'body' => $this->body,
                   ]);
   }
    public function render()
    {
        return view('livewire.blogpost.upsert');
    }
}
