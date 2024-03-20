<?php

namespace App\Livewire\Audit\Client\Sub\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Client\Sub\SalesTrack;
use Aaran\Audit\Models\Client\Sub\SalesTrackBill;
use Aaran\Audit\Models\Client\Sub\SalesTrackBillItem;
use Aaran\Audit\Models\Client\Sub\SalesTrackItem;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;

    public mixed $serial = 1;
    public mixed $client_id;
    public mixed $clients;

    public mixed $sales_track_id;
    public mixed $sales_track_item_id;
    public mixed $sales_track_bill_id;


    public $cdate;

    public function mount($id)
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->sales_track_id = $id;
    }


    public $salesTrack;
    public $salesTrackItems;
    public $salesTrackBills;
    public $salesTrackBillItems;
    public function loadDetails()
    {

        $this->salesTrack = $this->getSalesTrack($this->sales_track_id);

        $this->salesTrackItems = $this->getSalesTrackItems($this->salesTrack->sales_track_id);

        $this->salesTrackBills = $this->getSalesBills();

        $this->salesTrackBillItems = $this->getSalesBillItems();


    }

    public function getSalesTrack($v)
    {
        return SalesTrack::find($v);
    }

    public function getSalesTrackItems($v)
    {
        return SalesTrackItem::where('sales_track_id', '=', $v)->get;
    }

    public function getSalesBills($v)
    {
        return SalesTrackBill::where('sales_track_item_id', '=', $v)->get;
    }

    public function getSalesBillItems($v)
    {
        return SalesTrackBillItem::where('sales_track_bill_id', '=', $v)->get;
    }




    public function getList()
    {
        $this->sortField = 'sales_track_bill_items.serial';

        return SalesTrackBill::select(
            'sales_track_bills.*',
            'sales_track_bill_items.*'
        )
            ->join('sales_track_bill_items', 'sales_track_bill_items.sales_track_bill_id', '=', 'sales_track_bills.id')
            ->whereDate('vdate', '=', $this->cdate)
            ->where('sales_track_bills.active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender()
    {
        $this->render();
    }


    public function render()
    {
        return view('livewire.master.client.sub.sales-track.show')->with([
            'list' => $this->getList()
        ]);
    }
}
