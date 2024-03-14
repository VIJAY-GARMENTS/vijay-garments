<?php

namespace App\Livewire\Erp\Production\Cutting;

use Aaran\Erp\Models\Production\Cutting;
use App\Livewire\Trait\EntriesIndexAbstract;
use Illuminate\Support\Facades\DB;

class Index  extends EntriesIndexAbstract
{
    public function create(): void
    {
        $this->redirect(route('cuttings.upsert',['0']));
    }

    public function getList()
    {
        return Cutting::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function set_delete($id)
    {
        $obj=$this->getObj($id);
        DB::table('cutting_items')->where('cutting_id', '=', $this->vid)->delete();
        $obj->delete();

    }


    private function getObj($id)
    {
        if ($id) {
        $obj = Cutting::find($id);
        $this->vid = $obj->id;
        $this->vno = $obj->vno;
        $this->vdate = $obj->vdate;
        $this->order_id = $obj->order_id;
        $this->order_no = $obj->order->vname;
        $this->jobcard_id = $obj->jobcard_id;
        $this->jobcard_no = $obj->jobcard->vno;
        $this->cutting_master = $obj->cutting_master;
        $this->total_qty = $obj->total_qty;

            return $obj;
        }
        return null;
    }
    public function render()
    {
        return view('livewire.erp.production.cutting.index')->with([
            'list' => $this->getList()
        ]);
    }
}
