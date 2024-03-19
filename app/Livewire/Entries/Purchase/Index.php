<?php

namespace App\Livewire\Entries\Purchase;

use Aaran\Entries\Models\Purchase;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $sortField_1='purchase_no';
    use CommonTrait;

    public function create(): void
    {
        $this->redirect(route('purchases.upsert', ['0']));
    }

    public function getList()
    {
        return Purchase::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=',  session()->get('company_id'))
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

    public function getObj($id)
    {
        if ($id) {
            $obj = Purchase::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->company_id = $obj->company_id;
            $this->company_name = $obj->company->vname;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->purchase_no = $obj->purchase_no;
            $this->purchase_date = $obj->purchase_date;
            $this->Entry_no = $obj->Entry_no;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->bundle = $obj->bundle;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable= $obj->total_taxable;
            $this->total_gst=$obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger->vname;
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->active_id = $obj->active_id;

            return $obj;
        }
        return null;
    }

    public function set_delete($id): void
    {
        $obj=$this->getObj($id);
        DB::table('purchaseitems')->where('purchase_id', '=', $this->vid)->delete();
        $obj->delete();
    }

    public function print($id)
    {

        $this->redirect(route('purchases.print', [$this->getObj($id)]));
    }

    public function render()
    {
        return view('livewire.entries.purchase.index')->with([
            'list' => $this->getList()
        ]);
    }
}
