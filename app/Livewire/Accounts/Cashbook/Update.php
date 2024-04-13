<?php

namespace App\Livewire\Accounts\Cashbook;

use Aaran\Accounts\Models\Cashbook;
use Aaran\Master\Models\Order;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public $vid;
    public $vmode;
    public $vdate;
    public $cashbill_id;
    public $paidby;
    public $receipt;
    public $payment;
    public $balance = 0;
    public $approved;
    public $remarks;
    public $status_id;

    public $ledgers = [];
    public $cashbills = [];
    public $openingbalance = 0;
    protected array $rules = [
        'paidby' => 'required',
    ];
    protected array $messages = [

        'paidby.required' => 'This field cannot be empty.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
//        $this->cashbills = Cashbill::where('status_id', '!=', '5')->get();



        if ($id!=0) {
        $obj = Cashbook::find($id);
            $this->vid = $obj->id;
            $this->vmode = $obj->vmode;
            if ($obj->order_id!=0){
            $this->order_id = $obj->order_id;
            $this->order_no = $obj->order->vname;
            }
            $this->vdate = $obj->vdate;
            $this->cashbill_id = $obj->cashbill_id;
            $this->paidby = $obj->paidby;
            $this->receipt = $obj->receipt;
            $this->payment = $obj->payment;
            $this->balance = $obj->balance;
            $this->approved = $obj->approved;
            $this->remarks = $obj->remarks;
            $this->status_id = $obj->status_id;
        }
    }

    public function goSubmit()
    {
        $this->validate();

        if ($this->vid) {
            $this->update();
        } else {
            $this->save();
        }
        $this->clearFields();
        return redirect()->to(route('cashbooks'));
    }

    private function update()
    {
        $obj = Cashbook::find($this->vid);
        if ($obj->order_id!=0){

        $obj->order_id = $this->order_id;
        }
        $obj->vdate = $this->vdate;
        $obj->vmode = $this->vmode;
        $obj->cashbill_id = $this->cashbill_id;
        $obj->paidby = $this->paidby;
        $obj->receipt = $this->receipt;
        $obj->payment = $this->payment;
        $obj->balance = ($this->openingbalance + $this->receipt) - $this->payment;
        $obj->approved = $this->approved;
        $obj->remarks = $this->remarks;
        $obj->status_id = $this->status_id;
        $obj->save();

//        if (($this->payment != null) && ($this->payment != '0.00')) {
//
//            $cash_paid = Cashbook::where('cashbill_id', $this->cashbill_id)->sum('payment');
//
//            $cashbill = Cashbill::find($this->cashbill_id);
//            $cashbill->paid = $cash_paid;
//            $cashbill->balance = $cashbill->amount - $cash_paid;
//
//            if ($cashbill->balance < 0) {
//
//                //$balance = -1 * abs($balance);
//                //dd('Excess' . $cashbill->balance . ' than' . $cashbill->amount);
//
//                $cashbill->status_id = '7';
//
//            } else if ($cashbill->balance == 0) {
//
//                //dd('equals' . $cashbill->balance . ' than' . $cashbill->amount);
//
//                $cashbill->status_id = '5';
//
//            } else {
//
//                //dd('less' . $cashbill->balance . ' than' . $cashbill->amount);
//
//                $cashbill->status_id = '4';
//            }
//
//            $cashbill->save();
//        }

        session()->flash('success', '"' . $this->vmode . '"  has been updated.');
    }

    public function clearFields()
    {
        $this->vmode = '';
        $this->order_id = '';
        $this->vdate = '';
        $this->cashbill_id = '';
        $this->paidby = '';
        $this->receipt = '';
        $this->payment = '';
    }

    public function goBack()
    {
        $this->clearFields();
        return redirect()->to(route('cashbooks'));
    }

    public function getDelete()
    {
        if ($this->vid) {
            $obj = Cashbook::find($this->vid);
            $obj->delete();

            session()->flash('warning', '"' . $this->vmode . '"  has been deleted.');

            $this->clearFields();
        }
        return redirect()->to(route('cashbooks'));
    }

    public function render()
    {
        $this->getOrderList();
        return view('livewire.accounts.cashbook.update');
    }

    private function findBalance()
    {
        $obj = Cashbook::latest()->first();
        if ($obj) {
            $this->openingbalance = $obj->balance;
        }
    }

    public $order_id = '';
    public $order_no = '';
    public Collection $orderCollection;
    public $highlightOrder = 0;
    public $orderTyped = false;

    public function decrementOrder(): void
    {
        if ($this->highlightOrder === 0) {
            $this->highlightOrder = count($this->orderCollection) - 1;
            return;
        }
        $this->highlightOrder--;
    }

    public function incrementOrder(): void
    {
        if ($this->highlightOrder === count($this->orderCollection) - 1) {
            $this->highlightOrder = 0;
            return;
        }
        $this->highlightOrder++;
    }

    public function enterOrder(): void
    {
        $obj = $this->orderCollection[$this->highlightOrder] ?? null;

        $this->order_no = '';
        $this->orderCollection = Collection::empty();
        $this->highlightOrder = 0;

        $this->order_no = $obj['vname'] ?? '';;
        $this->order_id = $obj['id'] ?? '';;
    }

    public function setOrder($name, $id): void
    {
        $this->order_no = $name;
        $this->order_id = $id;
        $this->getOrderList();
    }

    #[On('refresh-order')]
    public function refreshOrder($v): void
    {
        $this->order_id = $v['id'];
        $this->order_no = $v['name'];
        $this->orderTyped = false;

    }

    public function getOrderList(): void
    {
        $this->orderCollection = $this->order_no ? Order::search(trim($this->order_no))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Order::where('company_id', '=', session()->get('company_id'))->get();
    }

    private function updateTotal()
    {
        $count = Cashbook::latest()->first()->id;

        $receipt = 0;
        $payment = 0;

        for ($i = $this->vid - 1; $i < $count + 1; $i++) {

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
    }
}
