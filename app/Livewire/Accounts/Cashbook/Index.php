<?php

namespace App\Livewire\Accounts\Cashbook;

use Aaran\Accounts\Models\Cashbook;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 50;

    public $sortField = 'id';

    public $sortAsc = true;

    public $searches = '';

    public $vdate='';
    public $vid='';





    public function receiptEntry()
    {
        return redirect()->to(route('cashbooks.create', ['mode'=>'receipt']));
    }

    public function paymentEntry()
    {
        return redirect()->to(route('cashbooks.create', ['mode'=>'payment']));
    }


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function reTotal()
    {
        $count = Cashbook::count();

        $receipt = 0;
        $payment = 0;

        for ($i = 1; $i < $count + 1; $i++) {

            $cashbook = Cashbook::find($i);

            if ($cashbook) {

                if ($cashbook->receipt != null) {
                    $receipt += $cashbook->receipt;
                } else {
                    $receipt += 0;
                }

                if ($cashbook->payment != null) {
                    $payment += $cashbook->payment;
                } else {
                    $payment += 0;
                }

                $balance = $receipt - $payment;

                $cashbook->balance = $balance;
                $cashbook->save();
            }
        }

        return redirect()->to(route('cashbooks'));

    }

    public function render()
    {
        return view('livewire.accounts.cashbook.index', [
            'list' => Cashbook::search($this->searches)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
//                ->lastPage()
        ]);
    }
}
