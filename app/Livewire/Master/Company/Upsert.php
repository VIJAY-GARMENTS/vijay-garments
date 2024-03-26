<?php

namespace App\Livewire\Master\Company;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\Master\Models\Company;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use function Livewire\store;
class Upsert extends Component
{
    use CommonTrait;
    use WithFileUploads;

    public string $mobile = '';
    public string $email = '';
    public string $gstin = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $display_name='';
    public string $landline='';
    public string $website='';
    public  $logo='';
    public string $pan='';

    public string $cities;
    public string $states;
    public string $pincode;


    public $city_id = '';
    public $city_name = '';
    public Collection $cityCollection;
    public $highlightCity = 0;
    public $cityTyped = false;

    public function decrementCity(): void
    {
        if ($this->highlightCity === 0) {
            $this->highlightCity = count($this->cityCollection) - 1;
            return;
        }
        $this->highlightCity--;
    }

    public function incrementCity(): void
    {
        if ($this->highlightCity === count($this->cityCollection) - 1) {
            $this->highlightCity = 0;
            return;
        }
        $this->highlightCity++;
    }
    public function setCity($name, $id): void
    {
        $this->city_name = $name;
        $this->city_id = $id;
        $this->getCityList();
    }

    public function enterCity(): void
    {
        $obj = $this->cityCollection[$this->highlightCity] ?? null;

        $this->city_name = '';
        $this->cityCollection = Collection::empty();
        $this->highlightCity = 0;

        $this->city_name = $obj['vname'] ?? '';;
        $this->city_id = $obj['id'] ?? '';;
    }

    #[On('refresh-city')]
    public function refreshCity($v): void
    {
        $this->city_id = $v['id'];
        $this->city_name = $v['name'];
        $this->cityTyped = false;

    }

    public function getCityList(): void
    {
        $this->cityCollection = $this->city_name ? City::search(trim($this->city_name ))->get():City::all();
    }

    public $state_id = '';
    public $state_name = '';
    public Collection $stateCollection;
    public $highlightState = 0;
    public $stateTyped = false;

    public function decrementState(): void
    {
        if ($this->highlightState === 0) {
            $this->highlightState = count($this->stateCollection) - 1;
            return;
        }
        $this->highlightState--;
    }

    public function incrementState(): void
    {
        if ($this->highlightState === count($this->stateCollection) - 1) {
            $this->highlightState = 0;
            return;
        }
        $this->highlightState++;
    }
    public function setState($name, $id): void
    {
        $this->state_name = $name;
        $this->state_id = $id;
        $this->getStateList();
    }

    public function enterState(): void
    {
        $obj = $this->stateCollection[$this->highlightState] ?? null;

        $this->state_name = '';
        $this->stateCollection = Collection::empty();
        $this->highlightState = 0;

        $this->state_name = $obj['vname'] ?? '';;
        $this->state_id = $obj['id'] ?? '';;
    }

    #[On('refresh-state')]
    public function refreshState($v): void
    {
        $this->state_id = $v['id'];
        $this->state_name = $v['name'];
        $this->stateTyped = false;

    }

    public function getStateList(): void
    {
        $this->stateCollection = $this->state_name ? State::search(trim($this->state_name ))
            ->get():State::all();
    }



    public $pincode_id = '';
    public $pincode_name = '';
    public Collection $pincodeCollection;
    public $highlightPincode = 0;
    public $pincodeTyped = false;

    public function decrementPincode(): void
    {
        if ($this->highlightPincode === 0) {
            $this->highlightPincode = count($this->pincodeCollection) - 1;
            return;
        }
        $this->highlightPincode--;
    }
    public function incrementPincode(): void
    {
        if ($this->highlightPincode === count($this->pincodeCollection) - 1) {
            $this->highlightPincode = 0;
            return;
        }
        $this->highlightPincode++;
    }

    public function enterPincode(): void
    {
        $obj = $this->pincodeCollection[$this->highlightPincode] ?? null;

        $this->pincode_name = '';
        $this->pincodeCollection = Collection::empty();
        $this->highlightPincode = 0;

        $this->pincode_name = $obj['vname'] ?? '';;
        $this->pincode_id = $obj['id'] ?? '';;
    }

    public function setPincode($name, $id): void
    {
        $this->pincode_name = $name;
        $this->pincode_id = $id;
        $this->getPincodeList();
    }
    #[On('refresh-pincode')]
    public function refreshPincode($v): void
    {
        $this->pincode_id = $v['id'];
        $this->pincode_name = $v['name'];
        $this->pincodeTyped = false;
    }
    public function getPincodeList(): void
    {
        $this->pincodeCollection = $this->pincode_name ? Pincode::search(trim($this->pincode_name))
            ->get() : Pincode::all();
    }

    public $tenant_id;


    public function save(): string
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                Company::create([
                    'vname' => Str::ucfirst($this->vname),
                    'display_name'=>$this->display_name,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'mobile' => $this->mobile,
                    'landline' => $this->landline,
                    'gstin' => $this->gstin,
                    'pan' => $this->pan,
                    'email' => $this->email,
                    'website' => $this->website,
                    'city_id' => $this->city_id,
                    'state_id' => $this->state_id,
                    'pincode_id' => $this->pincode_id,
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                    'tenant_id'=>session()->get('tenant_id'),
                    'logo' => $this->save_logo(),
                ]);
                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Company::find($this->vid);
                $obj->vname = Str::ucfirst($this->vname);
                $obj->display_name = $this->display_name;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->mobile = $this->mobile;
                $obj->landline = $this->landline;
                $obj->gstin = $this->gstin;
                $obj->pan = $this->pan;
                $obj->email = $this->email;
                $obj->website = $this->website;
                $obj->city_id = $this->city_id;
                $obj->state_id = $this->state_id;
                $obj->pincode_id = $this->pincode_id;
                $obj->active_id = $this->active_id;
                $obj->user_id = Auth::id();
                $obj->logo = $this->save_logo();
                $obj->save();
                $message = "Updated";
            }
            $this->getRoute();
            return $message;
        }
        return '';
    }

    public function mount($id): void
    {
        if ($id!=0){

            $obj=Company::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->display_name = $obj->display_name;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->mobile = $obj->mobile;
            $this->landline = $obj->landline;
            $this->gstin = $obj->gstin;
            $this->pan = $obj->pan;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->city_id = $obj->city_id;
            $this->city_name=$obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name= $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->active_id = $obj->active_id;
            $this->logo = $obj->logo;
        }else{
            $this->active_id=true;
        }
    }
    public function getObj($id)
    {
        if ($id) {
            $obj = Company::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->display_name = $obj->display_name;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->mobile = $obj->mobile;
            $this->landline = $obj->landline;
            $this->gstin = $obj->gstin;
            $this->pan = $obj->pan;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->city_id = $obj->city_id;
            $this->city_name=$obj->city->vname;
            $this->state_id = $obj->state_id;
            $this->state_name= $obj->state->vname;
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode->vname;
            $this->active_id = $obj->active_id;
            $this->logo = $obj->logo;
            return $obj;
        }
        return null;
    }

    public function save_logo()
    {
        return $this->logo->store('logo','public');
    }


    public function getRoute(): void
    {
        $this->redirect(route('companies'));
    }

    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        return view('livewire.master.company.upsert');
    }

}
