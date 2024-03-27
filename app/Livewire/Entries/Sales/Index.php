<?php

namespace App\Livewire\Entries\Sales;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Aaran\Orders\Models\Order;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    public $filter;
    public $byOrder;


    public Collection $contacts;
    public Collection $orders;
    public $sortField_1='invoice_no';
    public $showEditModal_1=false;

    public function create(): void
    {
        $this->redirect(route('sales.upsert', ['0']));
    }

    public function show_advance()
    {
        $this->showEditModal_1 = !$this->showEditModal_1;
    }

    public function getList()
    {

        return Sale::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->filter,function ($query,$filter){
                return $query->where('contact_id',$filter);
            })
            ->when($this->byOrder,function ($query,$byOrder){
                return $query->where('order_id',$byOrder);
            })
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
            $obj = Sale::find($id);
            $this->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->company_id = $obj->company_id;
            $this->company_name = $obj->company->vname;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->invoice_no = $obj->invoice_no;
            $this->invoice_date = $obj->invoice_date;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport->vname;
            $this->destination = $obj->destination;
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
        DB::table('saleitems')->where('sale_id', '=', $this->vid)->delete();
        $obj->delete();
    }

    public function print($id)
    {

        $this->redirect(route('sales.print', [$this->getObj($id)]));
    }

    public function getContact()
    {
        $this->contacts=Contact::all();

    }
    public function getOrder()
    {
        $this->orders=Order::all();

    }

    public function render()
    {
        $this->getContact();
        $this->getOrder();
        return view('livewire.entries.sales.index')
            ->with([
            'list' => $this->getList()
        ]);
    }
}
