<?php

namespace App\Livewire\Audit\Client\Sub\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Client\Sub\SalesTrackBill;
use Aaran\Audit\Models\Client\Sub\SalesTrackBillItem;
use Aaran\Audit\Models\Client\Sub\SalesTrackItem;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Livewire\Component;

class Items extends Component
{
    use CommonTrait;

    public mixed $serial = 1;
    public mixed $sales_track_id;
    public mixed $client_id;
    public mixed $clients;
    public mixed $total_count = 0;
    public mixed $total_value = 0;

    public function mount($id)
    {
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->sales_track_id = $id;
    }

    public function getSave(): void
    {
        if ($this->client_id != '') {
            if ($this->vid == "") {
                SalesTrackItem::create([
                    'serial' => $this->serial,
                    'sales_track_id' => $this->sales_track_id,
                    'client_id' => $this->client_id,
                    'total_count' => $this->total_count,
                    'total_value' => $this->total_value,
                    'status' => '1',
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = SalesTrackItem::find($this->vid);
                $obj->serial = $this->serial;
                $obj->sales_track_id = $this->sales_track_id;
                $obj->client_id = $this->client_id;
                $obj->total_count = $this->total_count;
                $obj->total_value = $this->total_value;
                $obj->active_id = $this->active_id;
                $obj->save();
            }
            $this->serial = '1';
            $this->client_id = '';
            $this->total_count = '';
            $this->total_value = '';
            $this->vname = '';
        }
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = SalesTrackItem::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->sales_track_id = $obj->sales_track_id;
            $this->client_id = $obj->client_id;
            $this->total_count = $obj->total_count;
            $this->total_value = $obj->total_value;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'serial';

        return SalesTrackItem::search($this->searches)
            ->where('sales_track_id', '=', $this->sales_track_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
//        $this->generateBills();

        return view('livewire.audit.client.sub.sales-track.items')->with([
            'list' => $this->getList()
        ]);
    }

    public bool $showSubItems = false;
    public mixed $margin = 0;
    public mixed $addMargin = 0;

    public function generateBills(): void
    {
        $salesTrackItem = SalesTrackItem::where('sales_track_id', '=', $this->sales_track_id)->get();

        for ($i = 0; $i < $salesTrackItem->count(); $i++) {
            $this->addMargin = ($this->margin * $i);
            if ($i + 1 < $salesTrackItem->count()) {
                $this->createBills($salesTrackItem[$i]['id'], $salesTrackItem[$i + 1]['client_id'],);
            }
        }
    }

    public function createBills($v, $client_id): void
    {
        $salesTrackBill = SalesTrackBill::create([
            'serial' => '0',
            'sales_track_item_id' => $v,
            'vno' => 0,
            'vdate' => (Carbon::parse(Carbon::now())->format('Y-m-d')),
            'client_id' => $client_id,
            'taxable' => '0',
            'gst' => '0',
            'grand_total' => '0',
            'vehicle' => 'TN',
            'status' => '1',
            'active_id' => '1',
        ]);

        $this->createBillItems($salesTrackBill->id);
    }

    private function createBillItems($id): void
    {
        $items = Client\Sub\TempBillItem::all();

        if ($items) {
            foreach ($items as $index => $row) {
                SalesTrackBillItem::create([
                    'serial' => $index + 1,
                    'sales_track_bill_id' => $id,
                    'product_id' => $row->product_id,
                    'qty' => $row->qty,
                    'price' => $row->price + $this->addMargin,
                    'active_id' => '1',
                ]);
            }
        }
    }

    public function showBillItems(): void
    {

        $this->showSubItems = !$this->showSubItems;
    }


}
