<?php

namespace App\Livewire\Taskmanager\Turnover;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Turnover;
use App\Enums\Months;
use App\Enums\Status;
use App\Enums\Years;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public mixed $client_id;
    public mixed $month;
    public mixed $year;
    public mixed $target;
    public mixed $achieved;
    public mixed $remarks;
    public mixed $status_id;

    public function mount()
    {
        $this->month = Months::AUGUST->value;
        $this->year = Years::AY_2024->value;
    }

    public function getSave(): string
    {
        if ($this->vid) {
            $obj = Turnover::find($this->vid);
            $obj->target = $this->target;
            $obj->achieved = $this->achieved;
            $obj->remarks = $this->remarks;

            if ($this->target == $this->achieved) {
                $obj->status_id = Status::FINISHED->value;
            } else {
                $obj->status_id = Status::PENDING->value;
            }
            $obj->user_id = Auth::id();
            $obj->company_id = session()->get('company_id');
            $obj->save();
        }

        $this->target = '';
        $this->achieved = '';
        $this->remarks = '';
        $this->status_id = '';
        return 'Updated';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Turnover::find($id);
            $this->vid = $obj->id;
            $this->target = $obj->target;
            $this->achieved = $obj->achieved;
            $this->remarks = $obj->remarks;
            $this->status_id = $obj->status_id;
        }
    }

    public function getList()
    {
        $this->sortField = 'client_id';

        return Turnover::search($this->searches)
            ->where('month', '=', $this->month)
            ->where('year', '=', $this->year)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function generate()
    {
        $gstClient = Client::all()->where('company_id', '=', session()->get('company_id'));

        foreach ($gstClient as $obj) {

            $gstv = Turnover::where('client_id', '=', $obj->id)
                ->Where('month', '=', $this->month)
                ->Where('year', '=', $this->year)
                ->get();

            if ($gstv->count() == 0) {

                Turnover::create([
                    'month' => $this->month,
                    'year' => $this->year,
                    'client_id' => $obj->id,
                    'target' => 0,
                    'achieved' => 0,
                    'remarks' => '',
                    'status_id' => '1',
                    'company_id'=>session()->get('company_id'),
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
        return view('livewire.taskmanager.turnover.index')->with([
            'list' => $this->getList()
        ]);
    }
}
