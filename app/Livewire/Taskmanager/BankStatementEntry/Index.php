<?php

namespace App\Livewire\Taskmanager\BankStatementEntry;

use Aaran\Audit\Models\ClientBank;
use Aaran\Taskmanager\Models\BankStatementEntry;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public mixed $bank_id;
    public mixed $entry;
    public mixed $remarks;
    public mixed $status_id;
    public mixed $current_date;

    public function mount(){
        $this->current_date = (Carbon::parse(Carbon::now())->format('Y-m-d'));
    }

    public function getSave(): string
    {
        if ($this->vid) {
            $obj = BankStatementEntry::find($this->vid);
            $obj->entry = $this->entry;
            $obj->remarks = $this->remarks;
            $obj->status_id = $this->status_id;
            $obj->active_id = $this->active_id ?: '1';
            $obj->user_id = Auth::id();
            $obj->save();
        }

        $this->entry = '';
        $this->remarks = '';
        $this->status_id = '';
        return 'Updated';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = BankStatementEntry::find($id);
            $this->vid = $obj->id;
            $this->entry = $obj->entry;
            $this->remarks = $obj->remarks;
            $this->status_id = $obj->status_id;
            $obj->company_id = session()->get('company_id');
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        $this->sortField = 'client_banks_id';

        return BankStatementEntry::search($this->searches)
            ->select('client_banks.vname as vname',
                'bank_statement_entries.*'
            )
            ->join('client_banks', 'client_banks.id', '=', 'bank_statement_entries.client_banks_id')
            ->where('bank_statement_entries.active_id','=', $this->activeRecord)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function generate()
    {
        $gstClient = ClientBank::where('active_id', '=', '1')->get();

        foreach ($gstClient as $obj) {

            $v = BankStatementEntry::where('client_banks_id', '=', $obj->id)->get();

            if ($v->count() == 0) {

                BankStatementEntry::create([
                    'client_banks_id' => $obj->id,
                    'entry' => now(),
                    'remarks' => '',
                    'status_id' => '1',
                    'active_id' => '1',
                    'company_id' => session()->get('company_id'),
                    'user_id' => Auth::id()
                ]);
            }
        }
        $this->reRender();
    }

    public function reRender()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.taskmanager.bank-statement-entry.index')->with([
            'list' => $this->getList()
        ]);
    }
}
