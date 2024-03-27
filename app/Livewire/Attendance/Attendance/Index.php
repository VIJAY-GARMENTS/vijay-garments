<?php

namespace App\Livewire\Attendance\Attendance;

use Aaran\Attendance\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public Attendance $attendance;
    public $vid = '';
    public $vdate = '';
    public $in_time = '';
    public $out_time = '';
    public mixed $amount= '';
    public mixed $total_amount= 0;
    public $user_name = '';
    public $user_id = '';



    public function save()
    {
        if ($this->vid == "") {
            Attendance::create([
                'user_id' => Auth::id(),
                'vdate' => $this->vdate,
                'in_time' => $this->in_time,
                'out_time' => $this->out_time,
                'amount' => $this->amount,
                'company_id' => session()->get('company_id'),
            ]);
        } else {
            $obj = Attendance::find($this->vid);
            $obj->user_id = Auth::id();
            $obj->vdate = $this->vdate;
            $obj->in_time = $this->in_time;
            $obj->out_time = Carbon::now()->format('g:i:s');
            $obj->amount = 307.69;
            $obj->company_id = session()->get('company_id');
            $obj->save();
        }
    }

    public function getlist()
    {
        return Attendance::all()->whereBetween('vdate',  [
            Carbon::now()->startOfMonth()->format('Y-m-d'),
            Carbon::now()->endOfMonth()->format('Y-m-d')
        ])  ->where('company_id', '=', session()->get('company_id'))->where('user_id', Auth::id());
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Attendance::find($id);
            $this->vid = $obj->id;
            $this->vdate = $obj->vdate;
            $this->in_time = $obj->in_time;
            $this->out_time = $obj->out_time;
            $this->user_id = $obj->user_id;
            $this->user_name = $obj->user->vname;
            return $obj;
        }
        return null;
    }

    public function mark_in()
    {
        if ($this->vid== "") {
        $this->in_time = Carbon::now()->format('g:i:s');
        $this->vdate = Carbon::parse(Carbon::now());
        $this->out_time = '';
        $this->save();
        }
    }

    public function mark_out($id)
    {
        $this->getObj($id);
        if ($this->out_time==""){
        $this->save();
        }
    }
    public function render()
    {
        return view('livewire.attendance.attendance.index')->with([
            'list' => $this->getList()
        ]);

    }
}
