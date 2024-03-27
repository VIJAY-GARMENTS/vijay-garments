<?php

namespace App\Livewire\Taskmanager\Activities;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Activities;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public mixed $cdate = '';
    public mixed $client_id = '';
    public mixed $duration = '';
    public mixed $channel = '';
    public string $remarks = '';
    public Collection $clients;
    public Collection $dates;


    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->dates = DB::table('activities')->select('cdate','created_at')->distinct('cdate')->limit(3)->orderBy('created_at', 'desc')->get();
        $this->clients = Client::all();
    }

    public function getSave(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Activities::create([
                    'user_id' => Auth::id(),
                    'cdate' => $this->cdate,
                    'vname' => $this->vname,
                    'client_id' => $this->client_id,
                    'duration' => $this->duration,
                    'channel' => $this->channel,
                    'remarks' => $this->remarks,
                    'company_id' => session()->get('company_id'),
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Activities::find($this->vid);
                $obj->user_id = Auth::id();
                $obj->cdate = $this->cdate;
                $obj->vname = $this->vname;
                $obj->client_id = $this->client_id;
                $obj->duration = $this->duration;
                $obj->channel = $this->channel;
                $obj->remarks = $this->remarks;
                $obj->company_id = session()->get('company_id');
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->cdate =(Carbon::parse(Carbon::now())->format('Y-m-d'));
            $this->client_id = '';
            $this->remarks = '';
            $this->duration = '';
            $this->channel = '';
            $this->reRender();
            return $message;
        }
        return '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Activities::find($id);
            $this->vid = $obj->id;
            $this->cdate = $obj->cdate;
            $this->vname = $obj->vname;
            $this->client_id = $obj->client_id;
            $this->duration = $obj->duration;
            $this->channel = $obj->channel;
            $this->remarks = $obj->remarks;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'created_at';

        return Activities::search($this->searches)
            ->whereDate('cdate', '=', $this->cdate)
            ->where('company_id', '=', session()->get('company_id'))
            ->where('user_id', '=', Auth::id())
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.taskmanager.activities.index')->with([
            'list' => $this->getList()
        ]);
    }
}
