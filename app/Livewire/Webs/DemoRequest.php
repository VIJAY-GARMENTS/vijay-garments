<?php

namespace App\Livewire\Webs;

use Illuminate\Support\Str;
use Livewire\Component;

class DemoRequest extends Component
{
    public $company_name;
    public $contact_person;
    public $email;
    public $ph_no;


    public function getSave(): string
    {
        if ($this->company_name != '') {
            if ($this->contact_person != "") {
                \App\Models\DemoRequest::create([
                    'company_name' => Str::ucfirst($this->company_name),
                    'contact_person' => Str::ucfirst($this->contact_person),
                    'email' => $this->email,
                    'ph_no' => $this->ph_no,
                ]);
            }
            session()->flash('message', 'Request successfully updated-Our Team Contact You Soon.');
            return redirect()->to('/');
        }

    }

    public function render()
    {
        return view('livewire.webs.demo-request')->layout('layouts.guest');
    }
}
