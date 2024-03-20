<?php

namespace App\Livewire\Audit\Client\Sub\SalesTrack;

use Aaran\Audit\Models\Client\Sub\SalesTrack;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public mixed $status = '1';

    public function getSave(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                SalesTrack::create([
                    'vname' => $this->vname,
                    'status' => $this->status ?: '1',
                    'active_id' => $this->active_id ?: '0'
                ]);
            } else {
                $obj = SalesTrack::find($this->vid);
                $obj->vname = $this->vname;
                $obj->status = $this->status;
                $obj->active_id = $this->active_id;
                $obj->save();
            }
            $this->vid = '';
            $this->vname = '';
            $this->status = '';
            $this->active_id = '1';
        }
    }

    private function getObj($id): void
    {
        if ($id) {
            $obj = SalesTrack::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->status = $obj->status;
            $this->active_id = $obj->active_id;
        }
    }

    private function getList()
    {
        return SalesTrack::search($this->searches)
            ->where('active_id', '=', '1')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.master.client.sub.sales-track.index')->with([
            'list' => $this->getList()
        ]);
    }
}
