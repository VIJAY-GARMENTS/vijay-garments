<?php

namespace App\Livewire\Audit\Client\Sub\SalesTrack;

use Aaran\Master\Models\Product;
use Aaran\Audit\Models\Client\Sub\SalesTrackBill as Tbi;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class TempBillItem extends Component
{
    use CommonTrait;

    public mixed $serial = 1;
    public mixed $product_id;
    public mixed $qty;
    public mixed $price;
    public mixed $products;
    public mixed $margin;

    public function mount()
    {
        $this->products = Product::where('active_id', '=', '1')->where('company_id','=',session()->get('company_id'))->get();
    }

    public function getSave(): void
    {
        if ($this->product_id != '') {
            if ($this->vid == "") {
                Tbi::create([
                    'serial' => $this->serial,
                    'product_id' => $this->product_id,
                    'qty' => $this->qty,
                    'price' => $this->price,
                    'margin' => $this->margin,
                ]);

            } else {
                $obj = Tbi::find($this->vid);
                $obj->serial = $this->serial;
                $obj->product_id = $this->product_id;
                $obj->qty = $this->qty;
                $obj->price = $this->price;
                $obj->margin = $this->margin;
                $obj->save();
            }
            $this->serial = '1';
            $this->product_id = '';
            $this->qty = '';
            $this->price = '';
            $this->margin = '';
        }
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Tbi::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->product_id = $obj->product_id;
            $this->qty = $obj->qty + 0;
            $this->price = $obj->price + 0;
            $this->margin = $obj->margin + 0;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'serial';

        return Tbi::search($this->searches)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender()
    {
        $this->render()->render();
    }

    public function refreshItems()
    {
        Tbi::truncate();
    }

    public function render()
    {
        return view('livewire.audit.client.sub.sales-track.temp-bill-item')->with([
            'list' => $this->getList()
        ]);
    }
}
