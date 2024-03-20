<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\ClientBank;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class BankDetails extends Component
{
    use CommonTrait;

    public ClientBank $bank;

    public function mount($id)
    {
        if ($id) {
            $this->bank = ClientBank::find($id);
        }
    }

    public function render()
    {
        return view('livewire.audit.client.bank-details');
    }
}
