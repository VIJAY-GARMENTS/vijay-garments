<?php

namespace App\Livewire\Audit\Client\Sub\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Client\Sub\SalesTrackBill;
use Aaran\Audit\Models\Client\Sub\SalesTrackItem;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Livewire\Component;

class Bill extends Component
{
    use CommonTrait;

    public mixed $serial = 1;
    public mixed $sales_track_item_id;
    public mixed $vno = '';
    public mixed $vdate;
    public mixed $client_id;
    public mixed $vehicle = '';

    public mixed $clients;
    public mixed $sales_track_item;

    public function mount($id)
    {
        $this->vdate =  (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->sales_track_item_id = $id;
        $this->sales_track_item =SalesTrackItem::find($id);
    }

    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                SalesTrackBill::create([
                    'serial' => $this->serial,
                    'sales_track_item_id' => $this->sales_track_item_id,
                    'vno' => $this->vno ?: 0,
                    'vdate' => $this->vdate ,
                    'client_id' => $this->client_id,
                    'taxable' => '0',
                    'gst' => '0',
                    'grand_total' => '0',
                    'vehicle' => $this->vehicle ?: '',
                    'status' => '1',
                    'company_id' => session()->get('company_id'),
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = SalesTrackBill::find($this->vid);
                $obj->serial = $this->serial;
                $obj->sales_track_item_id = $this->sales_track_item_id;
                $obj->vno = $this->vno;
                $obj->vdate = $this->vdate;
                $obj->client_id = $this->client_id;
                $obj->vehicle = $this->vehicle ?: '';
                $obj->company_id = session()->get('company_id');
                $obj->active_id = $this->active_id;
                $obj->save();
            }
            $this->serial = '1';
            $this->client_id = '';
            $this->vno = '';
            $this->vdate = '';
            $this->vehicle = '';
        }
    }

    public function clearFields()
    {
        $this->vid = '';
        $this->vname = '';
        $this->active_id = '1';
        $this->searches = '';
        $this->serial = '1';
        $this->client_id = '';
        $this->vno = '';
        $this->vdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->vehicle = '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = SalesTrackBill::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->sales_track_item_id = $obj->sales_track_item_id;
            $this->vno = $obj->vno;
            $this->vdate = $obj->vdate;
            $this->client_id = $obj->client_id;
            $this->vehicle = $obj->vehicle;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'serial';

        return SalesTrackBill::search($this->searches)
            ->where('sales_track_item_id', '=', $this->sales_track_item_id)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender()
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.audit.client.sub.sales-track.bill')->with([
            'list' => $this->getList()
        ]);
    }
}
