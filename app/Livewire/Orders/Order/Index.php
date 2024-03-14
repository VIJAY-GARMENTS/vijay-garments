<?php

namespace App\Livewire\Orders\Order;

use Aaran\Orders\Models\Order;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use CommonTrait;
    use WithPagination;

    public string $order_name='';

    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Order::create([
                    'vname' =>($this->vname),
                    'order_name' => Str::ucfirst($this->order_name),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Order::find($this->vid);
                $obj->vname = ($this->vname);
                $obj->order_name = Str::ucfirst($this->order_name);
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            return $message;
        }
        return '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Order::find($id);
            $this->vid = $obj->id;
            $this->vname= $obj->vname;
            $this->order_name= $obj->order_name;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        return Order::search($this->searches)
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
        return view('livewire.orders.order.index')->with([
            'list' => $this->getList()
        ]);
    }
}
