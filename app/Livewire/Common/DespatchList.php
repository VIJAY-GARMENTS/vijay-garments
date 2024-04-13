<?php

namespace App\Livewire\Common;

use Aaran\Common\Models\Despatch;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Component;

class DespatchList extends Component
{
    use CommonTrait;

    public $vdate;
    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Despatch::create([
                    'vname' => Str::ucfirst($this->vname),
                    'vdate' => $this->vdate,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Despatch::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->vdate = $this->vdate;
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
            $obj = Despatch::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->vdate = $obj->vdate;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        return Despatch::search($this->searches)
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
        return view('livewire.common.despatch-list')->with([
            'list' => $this->getList()
        ]);
    }
}
