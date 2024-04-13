<?php

namespace App\Livewire\Master\Order;

use Aaran\Master\Models\Order;
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
                    'company_id' => session()->get('company_id'),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Order::find($this->vid);
                $obj->vname = ($this->vname);
                $obj->order_name = Str::ucfirst($this->order_name);
                $obj->company_id = session()->get('company_id');
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
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.master.order.index')->with([
            'list' => $this->getList()
        ]);
    }
}
