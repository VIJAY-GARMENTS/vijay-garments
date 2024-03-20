<?php

namespace App\Livewire\Taskmanager\Activities;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Activities;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Admin extends Component
{
    use CommonTrait;

    public mixed $cdate = '';
    public mixed $client_id = '';
    public mixed $duration = '';
    public mixed $channel = '';
    public string $remarks = '';
    public Collection $clients;
    public Collection $dates;
    public Collection $users;
    public mixed $user_id = '';


    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->dates = DB::table('activities')->select('cdate','created_at')->distinct('cdate')->limit(3)->orderBy('created_at', 'desc')->get();
        $this->clients = Client::all();
        $this->users = User::all();
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
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
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

        if ($this->user_id) {
            return Activities::search($this->searches)
                ->whereDate('cdate', '=', $this->cdate)
                ->where('user_id', '=', $this->user_id)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        } else {
            return Activities::search($this->searches)
                ->whereDate('cdate', '=', $this->cdate)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        }
    }

    public function reRender(): void
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.taskmanager.activities.admin')->with([
            'list' => $this->getList()
        ]);
    }
}
