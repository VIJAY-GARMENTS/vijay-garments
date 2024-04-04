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
    public function set_delete($id): void
    {
        $obj= Contact::find($id);
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
