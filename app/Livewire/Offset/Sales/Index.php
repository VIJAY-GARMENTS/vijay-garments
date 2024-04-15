<?php

namespace App\Livewire\Offset\Sales;

use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
use Aaran\Offset\Models\Sale_offset;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    public $byOrder;


    public Collection $contacts;
    public Collection $orders;
    public $sortField_1='invoice_no';

    public function create(): void
    {
        $this->redirect(route('saleOffsets.upsert', ['0']));
    }

    public function getList()
    {

        return Sale_offset::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->filter,function ($query,$filter){
                return $query->where('contact_id',$filter);
            })
            ->when($this->byOrder,function ($query,$byOrder){
                return $query->where('order_id',$byOrder);
            })
            ->when($this->start_date,function ($query,$start_date){
                return $query->whereDate('invoice_date','>=',$start_date);
            })
            ->when($this->end_date,function ($query,$end_date){
                return $query->whereDate('invoice_date','<=',$end_date);
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
            $obj = Sale_offset::find($id);
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
        DB::table('saleitem_offsets')->where('sale_offset_id', '=', $this->vid)->delete();
        $obj->delete();
    }

    public function print($id)
    {

        $this->redirect(route('saleOffsets.print', [$this->getObj($id)]));
    }

    public function getContact()
    {
        $this->contacts=Contact::where('company_id','=',session()->get('company_id'))->get();

    }
    public function getOrder()
    {
        $this->orders=Order::where('company_id','=',session()->get('company_id'))->get();

    }

    public function render()
    {
        $this->getContact();
        $this->getOrder();
        return view('livewire.offset.sales.index')
            ->with([
            'list' => $this->getList()
        ]);
    }
}
