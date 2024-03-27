<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\Gstfilling;
use App\Enums\Months;
use App\Enums\Status;
use App\Enums\Years;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Filling extends Component
{
    use CommonTrait;

    public mixed $month;
    public mixed $year;
    public mixed $client_id;
    public mixed $gstr1_arn;
    public mixed $gstr1_date;
    public mixed $gstr3b_arn;
    public mixed $gstr3b_date;
    public mixed $filed;

    public function mount()
    {
        $this->month = date("m") -1;
        $this->year = Years::AY_2024->value;


    }

    public function getSave(): string
    {
        if ($this->vid) {
            $obj = Gstfilling::find($this->vid);
            $obj->gstr1_arn = $this->gstr1_arn;
            $obj->gstr1_date = $this->gstr1_date;
            $obj->gstr3b_arn = $this->gstr3b_arn;
            $obj->gstr3b_date = $this->gstr3b_date;

            if ($this->gstr1_arn != '' and $this->gstr3b_arn != '') {
                $obj->status_id = Status::FINISHED->value;
            } else {
                $obj->status_id = Status::PENDING->value;
            }
            $obj->company_id=session()->get('company_id');
            $obj->user_id = Auth::id();
            $obj->save();
        }

        $this->gstr1_arn = '';
        $this->gstr1_date = '';
        $this->gstr3b_arn = '';
        $this->gstr3b_date = '';
        return 'Updated';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Gstfilling::find($id);
            $this->vid = $obj->id;
            $this->gstr1_arn = $obj->gstr1_arn;
            $this->gstr1_date = $obj->gstr1_date;
            $this->gstr3b_arn = $obj->gstr3b_arn;
            $this->gstr3b_date = $obj->gstr3b_date;
        }
    }

    public function getList()
    {
        $this->sortField = 'client_id';

        return Gstfilling::search($this->searches)
            ->where('month', '=', $this->month)
            ->where('year', '=', $this->year)
            ->where('company_id','=',session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function generate()
    {
        $gstClient = Client::all()->where('company_id','=',session()->get('company_id'));

        foreach ($gstClient as $obj) {

            $gstv = Gstfilling::where('client_id', '=', $obj->id)
                ->Where('month', '=', $this->month)
                ->Where('year', '=', $this->year)
                ->where('company_id','=',session()->get('company_id'))
                ->get();

            if ($gstv->count() == 0) {

                Gstfilling::create([
                    'month' => $this->month,
                    'year' => $this->year,
                    'client_id' => $obj->id,
                    'gstr1_arn' => '',
                    'gstr1_date' => '',
                    'gstr3b_arn' => '',
                    'gstr3b_date' => '',
                    'status_id' => '1',
                    'company_id'=> session()->get('company_id'),
                    'user_id' => Auth::id()
                ]);
            }
        }
        $this->reRender();
    }

    public function FiledCount()
    {
        $f = DB::table('gstfillings')
            ->where('status_id', '=', Status::FINISHED->value)
            ->where('month', '=', $this->month)
            ->where('year', '=', $this->year)
            ->count();//filed count

        $c = DB::table('gstfillings')
            ->where('month', '=', $this->month)
            ->where('year', '=', $this->year)
            ->count();//client count

        $this->filed = $c - $f;
    }

    public function reRender()
    {
        $this->render();
    }

    public function render()
    {
        $this->FiledCount();

        return view('livewire.audit.client.filling')->with([
            'list' => $this->getList()
        ]);
    }
}
