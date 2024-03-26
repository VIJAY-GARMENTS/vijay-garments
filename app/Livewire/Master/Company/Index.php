<?php

namespace App\Livewire\Master\Company;

use Aaran\Master\Models\Company;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;
    public function create():void
    {
        $this->redirect(route("companies.upsert", ['0']));
    }

    public function getList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Company::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('tenant_id', '=', session()->get('tenant_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function getobj($id)
    {
        if ($id) {
            $obj = Company::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->display_name = $obj->display_name;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->mobile = $obj->mobile;
            $this->landline = $obj->landline;
            $this->gstin = $obj->gstin;
            $this->pan = $obj->pan;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->city_id = $obj->city_id;
            $this->city_name=$obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name= $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->active_id = $obj->active_id;
            $this->logo = $obj->logo;
            return $obj;
        }
        return null;
    }

    public function set_delete($id): void
    {
        $obj=$this->getobj($id);
        $obj->delete();
    }

    public function reRender(): void
    {
        $this->render()->render();
    }

    public function render()
    {
        return view('livewire.master.company.index')->with([
            'list' => $this->getList()
        ]);
    }
}
