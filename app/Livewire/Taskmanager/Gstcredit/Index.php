<?php

namespace App\Livewire\Taskmanager\Gstcredit;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Gstcredit;
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
    public mixed $opening_igst;
    public mixed $opening_cgst;
    public mixed $opening_sgst;

    public mixed $sales_igst;
    public mixed $sales_cgst;
    public mixed $sales_sgst;

    public mixed $purchase_igst;
    public mixed $purchase_cgst;
    public mixed $purchase_sgst;
    public mixed $remarks;

    public function mount()
    {
        $this->month = date("m");
        $this->year = Years::AY_2024->value;
    }

    public function getSave(): string
    {
        if ($this->vid) {
            $obj = Gstcredit::find($this->vid);

            $obj->opening_igst = $this->opening_igst;
            $obj->opening_cgst = $this->opening_cgst;
            $obj->opening_sgst = $this->opening_sgst;

            $obj->sales_igst = $this->sales_igst;
            $obj->sales_cgst = $this->sales_cgst;
            $obj->sales_sgst = $this->sales_sgst;

            $obj->purchase_igst = $this->purchase_igst;
            $obj->purchase_cgst = $this->purchase_cgst;
            $obj->purchase_sgst = $this->purchase_sgst;

            $obj->remarks = $this->remarks;

            $obj->user_id = Auth::id();
            $obj->save();
        }

        $this->opening_igst = '';
        $this->opening_cgst = '';
        $this->opening_sgst = '';

        $this->sales_igst = '';
        $this->sales_cgst = '';
        $this->sales_sgst = '';

        $this->purchase_igst = '';
        $this->purchase_cgst = '';
        $this->purchase_sgst = '';

        $this->remarks = '';
        return 'Updated';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Gstcredit::find($id);
            $this->vid = $obj->id;
            $this->opening_igst = $obj->opening_igst+0;
            $this->opening_cgst = $obj->opening_cgst+0;
            $this->opening_sgst = $obj->opening_sgst+0;

            $this->sales_igst = $obj->sales_igst+0;
            $this->sales_cgst = $obj->sales_cgst+0;
            $this->sales_sgst = $obj->sales_sgst+0;

            $this->purchase_igst = $obj->purchase_igst+0;
            $this->purchase_cgst = $obj->purchase_cgst+0;
            $this->purchase_sgst = $obj->purchase_sgst+0;

            $this->remarks = $obj->remarks;
        }
    }

    public function getList()
    {
        $this->sortField = 'client_id';

        return Gstcredit::search($this->searches)
            ->where('month', '=', $this->month)
            ->where('year', '=', $this->year)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function generate()
    {
        $gstClient = Client::all();

        foreach ($gstClient as $obj) {

            $gstv = Gstcredit::where('client_id', '=', $obj->id)
                ->Where('month', '=', $this->month)
                ->Where('year', '=', $this->year)
                ->get();

            if ($gstv->count() == 0) {

                Gstcredit::create([
                    'month' => $this->month,
                    'year' => $this->year,
                    'client_id' => $obj->id,
                    'opening_igst' => 0,
                    'opening_cgst' => 0,
                    'opening_sgst' => 0,
                    'sales_igst' => 0,
                    'sales_cgst' => 0,
                    'sales_sgst' => 0,
                    'purchase_igst' => 0,
                    'purchase_cgst' => 0,
                    'purchase_sgst' => 0,
                    'remarks' => '',
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
        return view('livewire.taskmanager.gstcredit.index')->with([
            'list' => $this->getList()
        ]);
    }
}
