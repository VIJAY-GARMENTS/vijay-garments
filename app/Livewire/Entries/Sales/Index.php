<?php

namespace App\Livewire\Entries\Sales;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
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
        $this->redirect(route('sales.upsert', ['0']));
    }


    public function getList()
    {

        return Sale::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->when($this->start_date,function ($query,$start_date){
                return $query->whereDate('invoice_date','>=',$start_date);
            })
            ->when($this->end_date,function ($query,$end_date){
                return $query->whereDate('invoice_date','<=',$end_date);
            })
            ->when($this->filter,function ($query,$filter){
                return $query->where('contact_id',$filter);
            })
            ->where('company_id', '=',  session()->get('company_id'))
            ->orderBy($this->sortField_1, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

//            ->when($this->byOrder,function ($query,$byOrder){
//                return $query->where('order_id',$byOrder);
//            })

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
    public function set_delete($id): void
    {
        $obj=Sale::find($id);
        DB::table('saleitems')->where('sale_id', '=', $this->vid)->delete();
        $obj->delete();
    }

    public function print($id)
    {

        $this->redirect(route('sales.print', [Sale::find($id)]));
    }

    public function getContact()
    {
        $this->contacts=Contact::where('company_id','=',session()->get('company_id'))->get();

    }
//    public function getOrder()
//    {
//        $this->orders=Order::where('company_id','=',session()->get('company_id'))->get();
//
//    }

    public function render()
    {
        $this->getContact();
//        $this->getOrder();
        return view('livewire.entries.sales.index')
            ->with([
            'list' => $this->getList()
        ]);
    }
}
