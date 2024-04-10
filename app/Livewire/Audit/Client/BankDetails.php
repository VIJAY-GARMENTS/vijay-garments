<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\ClientBank;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class BankDetails extends Component
{
    use CommonTrait;

    public ClientBank $bank;
    public Collection $banks;

    public function getClientBank()
    {
        $this->banks=ClientBank::all();
    }
    public function switch($i)
    {
        $this->mount($i);
    }


    public function mount($id)
    {
        if ($id) {
            $this->bank = ClientBank::find($id);
        }
    }

    public function render()
    {
        $this->getClientBank();
        return view('livewire.audit.client.bank-details');
    }
}
