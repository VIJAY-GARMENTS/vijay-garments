<?php

namespace App\Livewire\Accounts\Cashbook;

use Aaran\Accounts\Models\Cashbook;
use Aaran\Common\Models\Ledger;
use Aaran\Master\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public string $vid = '';
    public  string $vmode = '';
    public string $vdate = '';
    public string $remarks= '';
    public $cashbill_id = null;
    public string $paidby = '';
    public float $receipt = 0;
    public float $payment = 0;
    public float $balance = 0;

    public Collection $orders;
    public Collection $ledgers;
    public Collection $cashbills;

    protected array $rules = [
        'paidby' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected array $messages = [

        'paidby.required' => 'This field cannot be empty.',
    ];

    public function mount($mode)
    {
        $this->orders = Order::all();
        $this->ledgers = Ledger::all();

//        $this->cashbills = Cashbill::where('status_id','!=','5')->get();

        $this->vmode = $mode;

    }

    private function save()
    {
        $this->findBalance();

        if ($this->vdate == null) {
            $this->vdate = Carbon::now();
        }

        if ($this->payment == null) {
            $this->payment = 0;
        }

        if ($this->receipt == null) {
            $this->receipt = 0;
        }

        if ($this->order_id == null) {
            $this->order_id = null;
        }

        if ($this->cashbill_id == null) {
            $this->cashbill_id = null;
        }

        Cashbook::create([
            'vmode' => $this->vmode,
            'order_id' => $this->order_id,
            'vdate' => $this->vdate,
            'cashbill_id' => $this->cashbill_id,
            'paidby' => $this->paidby,
            'receipt' => $this->receipt,
            'payment' => $this->payment,
            'balance' => ($this->balance + $this->receipt) - $this->payment,
            'approved' => "0",
            'remarks' =>$this->remarks,
            'status_id' => '1',
        ]);

        if ($this->cashbill_id) {
            $this->setStatus();
        }

        session()->flash('success', '"' . $this->vmode . '"  has been Saved.');
    }


    private function findBalance()
    {
        $receipt = Cashbook::sum('receipt');
        $payment = Cashbook::sum('payment');

        $this->balance = $receipt - $payment;

    }

//    private function setStatus()
//    {
//        if ($this->payment != null) {
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
//    }

    public function clearFields()
    {
        $this->vmode = '';
        $this->order_id = '';
        $this->vdate = '';
        $this->cashbill_id = '';
        $this->paidby = '';
        $this->receipt = 0;
        $this->payment = 0;
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


    protected $listeners = ['setCashBill'];


    public function setCashBill($ids)
    {
        $this->cashbill_id = $ids;
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

    public function render()
    {
        $this->getOrderList();
        return view('livewire.accounts.cashbook.create');
    }
}
