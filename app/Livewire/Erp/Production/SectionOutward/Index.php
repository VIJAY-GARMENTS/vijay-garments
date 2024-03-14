<?php

namespace App\Livewire\Erp\Production\SectionOutward;

use Aaran\Erp\Models\Production\SectionOutward;
use App\Livewire\Trait\EntriesIndexAbstract;
use Illuminate\Support\Facades\DB;

class Index extends EntriesIndexAbstract
{
    public function create(): void
    {
        $this->redirect(route('sectionoutwards.upsert', ['0']));
    }

    public function getList()
    {
        return SectionOutward::search($this->searches)
            ->select('orders.vname as order_name',
                'styles.vname as style_name',
                'jobcards.vno as jobcard_no',
                'contacts.vname as contact_name',
                'section_outwards.*'
            )
            ->join('contacts', 'contacts.id', '=', 'section_outwards.contact_id')
            ->join('jobcards', 'jobcards.id', '=', 'section_outwards.jobcard_id')
            ->join('orders', 'orders.id', '=', 'jobcards.order_id')
            ->join('styles', 'styles.id', '=', 'jobcards.style_id')
            ->where('section_outwards.active_id', '=', $this->activeRecord)
            ->where('section_outwards.company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function set_delete($id): void
    {
        $obj=$this->getObj($id);
        DB::table('section_outward_items')->where('section_outward_id', '=', $this->vid)->delete();
        $obj->delete();
    }
    private function getObj($id)
    {
        if ($id) {
            $obj = SectionOutward::find($id);
            $this->vid = $obj->id;
            $this->vno = $obj->vno;
            $this->vdate = $obj->vdate;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->order_no = $obj->jobcard->order->vname;
            $this->jobcard_id = $obj->jobcard_id;
            $this->jobcard_no = $obj->jobcard->vno;
            $this->total_qty = $obj->total_qty;
            $this->receiver_details = $obj->receiver_details;
            return $obj;
        }
        return null;
    }

    public function print($id)
    {

        $this->redirect(route('sectionoutwards.print', [$this->getObj($id)]));
    }

    public function render()
    {
        return view('livewire.erp.production.section-outward.index')->with([
            'list' => $this->getList()
        ]);
    }

}
