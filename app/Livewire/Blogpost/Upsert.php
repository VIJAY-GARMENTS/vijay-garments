<?php

namespace App\Livewire\Blogpost;

use Blog\Blogpost\Model\Blogpost;
use Livewire\Component;

class Upsert extends Component
{
    public string $title= '';
    public string $heading='';
    public string $body='';
    public $logo='';

    public function save():string

    {
       if ($this->title != ''){
           Blogpost::create([
               'title' =>$this->title,
               'heading' =>$this->heading,
               'body' =>$this->body,
               'logo' => $this->save_logo(),
           ]);
           $message = "Saved";
           $this->getRoute();
       }
       else{
          $obj = Blogpost::find($this->vid);
              $obj->title =>$this->title;
              $obj->heading =>$this->heading;
              $obj->body =>$this->body;
              $obj->logo => $this->save_logo();
              $message = "Updated";
       }
        $this->getRoute();
        return $message;
    }
      return '';
    }
    public function render()
    {
        return view('livewire.blogpost.upsert');
    }
}
