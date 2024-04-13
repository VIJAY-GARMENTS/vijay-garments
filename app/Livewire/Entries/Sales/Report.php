<?php

namespace App\Livewire\Entries\Sales;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Order;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Report extends Component
{
    use CommonTrait;
    public Collection $contact;
    public Collection $orders;
    public $by_company;
    public $byOrder;
    public $start_date;
    public $end_date;



    public function getContact()
    {
        $this->contact=Contact::where('company_id','=',session()->get('company_id'))->get();
    }

    public function getOrder()
    {
        $this->orders=Order::where('company_id','=',session()->get('company_id'))->get();

    }

    public function getList()
    {

        return Sale::where('active_id', '=', $this->activeRecord)
            ->when($this->by_company,function ($query,$by_company){
                return $query->where('contact_id',$by_company);
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
            ->paginate($this->perPage);
    }


    public function render()
    {
        $this->getContact();
        $this->getOrder();
        return view('livewire.entries.sales.report')->with([
            'list' => $this->getList()
        ]);
    }
}
