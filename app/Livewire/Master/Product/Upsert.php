<?php

namespace App\Livewire\Master\Product;

use Aaran\Common\Models\Hsncode;
use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Upsert extends Component
{
    use CommonTrait;

    public $hsncode_id = '';
    public $hsncode_no = '';
    public Collection $hsncodeCollection;
    public $highlightHsncode = 0;
    public $hsncodeTyped = false;

    public function decrementHsncode(): void
    {
        if ($this->highlightHsncode === 0) {
            $this->highlightHsncode = count($this->hsncodeCollection) - 1;
            return;
        }
        $this->highlightHsncode--;
    }

    public function incrementHsncode(): void
    {
        if ($this->highlightHsncode === count($this->hsncodeCollection) - 1) {
            $this->highlightHsncode = 0;
            return;
        }
        $this->highlightHsncode++;
    }

    public function setHsncode($name, $id): void
    {
        $this->hsncode_no = $name;
        $this->hsncode_id = $id;
        $this->getHsncodeList();
    }

    public function enterHsncode(): void
    {
        $obj = $this->hsncodeCollection[$this->highlightHsncode] ?? null;

        $this->hsncode_no = '';
        $this->hsncodeCollection = Collection::empty();
        $this->highlightHsncode = 0;

        $this->hsncode_no = $obj['vname'] ?? '';;
        $this->hsncode_id = $obj['id'] ?? '';;
    }

    #[On('refresh-hsncode')]
    public function refreshHsncode($v): void
    {
        $this->hsncode_id = $v['id'];
        $this->hsncode_no = $v['name'];
        $this->hsncodeTyped = false;

    }

    public function getHsncodeList(): void
    {
        $this->hsncodeCollection = $this->hsncode_no ? Hsncode::search(trim($this->hsncode_no))->get() : Hsncode::all();
    }

    public string $product_type;
    public string $units;
    public string $gst_percent;
    public  $company_id;

    public function save(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Product::create([
                    'vname' => Str::ucfirst($this->vname),
                    'product_type' => $this->product_type,
                    'hsncode_id' => $this->hsncode_id,
                    'units' => $this->units,
                    'gst_percent' => $this->gst_percent,
                    'active_id' => $this->active_id,
                    'company_id' => session()->get('company_id'),
                    'user_id' => Auth::id()
                ]);
                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Product::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->product_type = $this->product_type;
                $obj->hsncode_id = $this->hsncode_id;
                $obj->units = $this->units;
                $obj->gst_percent = $this->gst_percent;
                $obj->active_id = $this->active_id;
                $obj->company_id = session()->get('company_id');
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }
            $this->getRoute();
            return $message;
        }
        return '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Product::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->product_type = $obj->product_type;
            $this->units = $obj->units;
            $this->gst_percent = $obj->gst_percent;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public string $vid = '';
    public string $vname = '';

    public function mount($id): void
    {

        if ($id != 0) {

            $obj = Product::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->product_type = $obj->product_type;
            $this->hsncode_id = $obj->hsncode_id;
            $this->hsncode_no = $obj->hsncode->vname;
            $this->units = $obj->units;
            $this->gst_percent = $obj->gst_percent;
            $this->active_id = $obj->active_id;
        } else {
            $this->active_id = true;
        }

    }

    public function getRoute(): void
    {
        $this->redirect(route('products'));
    }

    public function render()
    {
        $this->getHsncodeList();
        return view('livewire.master.product.upsert');
    }
}
