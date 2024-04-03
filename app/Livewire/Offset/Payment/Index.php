<?php

namespace App\Livewire\Offset\Payment;

use Aaran\Entries\Models\Payment;
use Aaran\Offset\Models\Payment_offset;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    public $sortField_1='vdate';
    public function create(): void
    {
        $this->redirect(route('paymentOffsets.upsert', ['0']));
    }


    public function getList()
    {
        return Payment_offset::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField_1, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function sortBy($field): void
    {
        if ($this->sortField_1=== $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function set_delete($id)
    {
        $obj=$this->getObj($id);
        DB::table('paymentitem_offsets')->where('payment_offset_id', '=', $this->vid)->delete();
        $obj->delete();

    }

    private function getObj($id)
    {
        if ($id) {
            $obj = Payment_offset::find($id);
            $this->vid = $obj->id;
            $this->acyear = $obj->acyear;
            $this->vdate = $obj->vdate;
            $this->company_id = $obj->company_id;
            $this->company_name = $obj->company->vname;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->receipttype_id = $obj->receipttype_id;
            $this->receipttype_name = $obj->receipttype->vname;
            $this->chq_no = $obj->chq_no;
            $this->chq_date = $obj->chq_date;
            $this->bank_id = $obj->bank_id;
            $this->bank_name = $obj->bank->vname;
            $this->payment_amount = $obj->payment_amount;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }
    public function render()
    {
        return view('livewire.offset.payment.index')->with([
            'list' => $this->getList()
        ]);
    }
}
