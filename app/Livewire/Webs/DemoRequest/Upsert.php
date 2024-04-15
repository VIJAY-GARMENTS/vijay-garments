<?php

namespace App\Livewire\Webs\DemoRequest;

use Aaran\Demo\Models\DemoRequest;
use Illuminate\Support\Str;
use Livewire\Component;

class Upsert extends Component
{
    public $company_name;
    public $contact_person;
    public $email;
    public $mobile;


    public function getSave()
    {
        $this->validate([
            'company_name'=>'required|min:3',
            'contact_person'=>'required|min:3',
        ]);
        if ($this->company_name != '') {
            if ($this->contact_person != "") {
                DemoRequest::create([
                    'company_name' => Str::ucfirst($this->company_name),
                    'contact_person' => Str::ucfirst($this->contact_person),
                    'email' => $this->email,
                    'mobile' => $this->mobile,
                ]);
            }
            session()->flash('message', 'Request successfully updated, Our Team Contact You Soon.');

//            $this->redirect(route('home'));

        }
    }

    public function render()
    {
        return view('livewire.webs.demo-request.upsert')->layout('layouts.guest');
    }
}
