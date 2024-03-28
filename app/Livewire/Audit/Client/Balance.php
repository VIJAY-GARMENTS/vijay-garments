<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\BankBalance;
use Aaran\Audit\Models\ClientBank;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Balance extends Component
{
    use CommonTrait;

    public string $client_bank_id = '';
    public mixed $cdate;
    public mixed $balance = 0;
    public $clients;
    public $dates;

    public function mount()
    {
        $this->cdate = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->clients = ClientBank::where('active_id', '=', '1')->where('company_id', '=', session()->get('company_id'))->get();
        $this->dates = DB::table('bank_balances')->select('cdate')->distinct('cdate')->limit(3)->orderBy('cdate', 'desc')->get();
    }

    public function getSave(): string
    {
        if ($this->client_bank_id != '' or $this->acno != '' or $this->ifsc != '') {
            if ($this->vid !== "") {
                $obj = BankBalance::find($this->vid);
                $obj->client_bank_id = $this->client_bank_id;
                $obj->cdate = $this->cdate;
                $obj->balance = $this->balance;
                $obj->user_id = Auth::id();
                $obj->company_id = session()->get('company_id');
                $obj->save();
                $message = "Updated";
            }

            $this->client_bank_id = '';
            $this->balance = '';

            return $message;
        }
        return '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = BankBalance::find($id);
            $this->vid = $obj->id;
            $this->client_bank_id = $obj->client_bank_id;
            $this->cdate = $obj->cdate;
            $this->balance = $obj->balance;
            return $obj;
        }
        return null;
    }

    public function generate(): void
    {
        $gstClient = ClientBank::where('active_id', '=', '1')->where('company_id', '=', session()->get('company_id'))->get();

        if ($this->cdate == '') {
            $this->cdate = now();
        }

        foreach ($gstClient as $obj) {

            $v = BankBalance::where('client_bank_id', '=', $obj->id)
                ->where('company_id', '=', session()->get('company_id'))
                ->Where('cdate', '=', $this->cdate)
                ->get();

            if ($v->count() == 0) {
                BankBalance::create([
                    'client_bank_id' => $obj->id,
                    'cdate' => $this->cdate,
                    'balance' => 0,
                    'company_id' => session()->get('company_id'),
                    'user_id' => Auth::id()
                ]);
            }
        }
    }

    public function getList()
    {
        $this->sortField = 'client_bank_id';


        return BankBalance::search($this->searches)
            ->whereDate('cdate', '=', $this->cdate)
            ->where('company_id', '=', session()->get('company_id'))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function reRender()
    {
        $this->render();
    }

    public function render()
    {


        return view('livewire.audit.client.balance')->with([
            'list' => $this->getList()
        ]);
    }
}
