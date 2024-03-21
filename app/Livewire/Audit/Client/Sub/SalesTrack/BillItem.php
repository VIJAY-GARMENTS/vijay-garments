<?php

namespace App\Livewire\Audit\Client\Sub\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Client\Sub\SalesTrackBill;
use Aaran\Audit\Models\Client\Sub\SalesTrackBillItem;
use Aaran\Common\Models\Category;
use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Size;
use Aaran\Master\Models\Product;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class BillItem extends Component
{
    use CommonTrait;

    public mixed $serial = 1;
    public mixed $sales_track_bill_id;
    public mixed $product_id;
    public mixed $category_id;
    public mixed $colour_id;
    public mixed $size_id;
    public mixed $qty;
    public mixed $price;

    public mixed $clients;
    public mixed $products;
    public mixed $categories;
    public mixed $colours;
    public mixed $sizes;
    public mixed $sales_track_bill;

    public function mount($id)
    {
        $this->clients = Client::where('active_id', '=', '1')->get();
        $this->products = Product::where('active_id', '=', '1')->get();
        $this->categories = Category::where('active_id', '=', '1')->get();
        $this->sizes = Size::where('active_id', '=', '1')->get();
        $this->colours = Colour::where('active_id', '=', '1')->get();
        $this->sales_track_bill_id = $id;
        $this->sales_track_bill = SalesTrackBill::find($id);

    }

    public function getSave(): void
    {
        if ($this->product_id != '') {
            if ($this->vid == "") {
                SalesTrackBillItem::create([
                    'serial' => $this->serial,
                    'sales_track_bill_id' => $this->sales_track_bill_id,
                    'product_id' => $this->product_id,
                    'category_id' => $this->category_id,
                    'colour_id' => $this->colour_id,
                    'size_id' => $this->size_id,
                    'qty' => $this->qty,
                    'price' => $this->price,
                    'active_id' => $this->active_id ?: '0',
                ]);

            } else {
                $obj = SalesTrackBillItem::find($this->vid);
                $obj->serial = $this->serial;
                $obj->sales_track_bill_id = $this->sales_track_bill_id;
                $obj->product_id = $this->product_id;
                $obj->category_id = $this->category_id;
                $obj->colour_id = $this->colour_id;
                $obj->size_id = $this->size_id;
                $obj->qty = $this->qty;
                $obj->price = $this->price;
                $obj->active_id = $this->active_id;
                $obj->save();
            }
            $this->serial = '1';
            $this->product_id = '';
            $this->qty = '';
            $this->price = '';
        }
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = SalesTrackBillItem::find($id);
            $this->vid = $obj->id;
            $this->serial = $obj->serial;
            $this->sales_track_bill_id = $obj->sales_track_bill_id;
            $this->product_id = $obj->product_id;
            $this->category_id = $obj->category_id;
            $this->colour_id = $obj->colour_id;
            $this->size_id = $obj->size_id;
            $this->qty = $obj->qty + 0;
            $this->price = $obj->price + 0;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'serial';

        return SalesTrackBillItem::search($this->searches)
            ->where('sales_track_bill_id', '=', $this->sales_track_bill_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function markAsEntered()
    {
        $bill = SalesTrackBillItem::search($this->searches)
            ->where('sales_track_bill_id', '=', $this->sales_track_bill_id)->get();

        foreach ($bill as $row)
        {
            $obj = SalesTrackBillItem::find($row->id);
            $obj->active_id = Active::NOTACTIVE;
            $obj->save();
        }

        $obj = SalesTrackBill::find($this->sales_track_bill_id);
        $obj->active_id = Active::NOTACTIVE;
        $obj->save();

        $this->redirect(route('salesTracks.bills',[$this->sales_track_bill_id]));

    }

    public function reRender()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.audit.client.sub.sales-track.bill-item')->with([
            'list' => $this->getList()
        ]);
    }
}
