<?php

namespace App\Livewire\Master\Contact;


use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    public function create():void
    {
        $this->redirect(route("contacts.upsert", ['0']));
    }

    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Contact::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Contact::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->mobile = $obj->mobile;
            $this->whatsapp = $obj->whatsapp;
            $this->email = $obj->email;
            $this->gstin = $obj->gstin;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->city_id = $obj->city_id;
            $this->state_id = $obj->state_id;
            $this->pincode_id = $obj->pincode_id;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    public function set_delete($id): void
    {
        $obj=$this->getObj($id);
        $obj->delete();


    }

    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.master.contact.index')->with([
            'list' => $this->getList()
        ]);
    }
}
