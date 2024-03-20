<?php

namespace App\Livewire\Magalir\MgMember;

use Aaran\Magalir\Models\MgClub;
use Aaran\Magalir\Models\MgMember;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public string $mg_club_id = '';
    public string $photo = '';
    public string $father = '';
    public string $mother = '';
    public string $dob = '';
    public string $aadhaar = '';
    public string $pan = '';
    public string $mobile = '';
    public string $mobile_2 = '';
    public string $email = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $city = '';
    public string $state = '';
    public string $pincode = '';
    public string $nominee = '';
    public string $n_mobile = '';
    public string $n_aadhaar = '';

    public mixed $clubs;

    public function mount($id)
    {
        if ($id) {
            $this->mg_club_id = $id;
        }

        $this->dob = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->clubs = MgClub::where('active_id', '1')->get();
    }


    public function getSave(): string
    {
        $this->dob = (Carbon::parse(Carbon::now())->format('Y-m-d'));

        if ($this->vname != '') {
            if ($this->vid == "") {

                MgMember::create([
                    'mg_club_id' => $this->mg_club_id,
                    'vname' => Str::upper($this->vname),
                    'father' => Str::ucfirst($this->father),
                    'mother' => Str::ucfirst($this->mother),
                    'dob' => $this->dob,
                    'aadhaar' => $this->aadhaar,
                    'pan' => $this->pan,
                    'mobile' => $this->mobile,
                    'mobile_2' => $this->mobile_2,
                    'email' => $this->email,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city' => $this->city,
                    'state' => $this->state,
                    'pincode' => $this->pincode,
                    'nominee' => $this->nominee,
                    'n_mobile' => $this->n_mobile,
                    'n_aadhaar' => $this->n_aadhaar,
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                ]);

                $message = "Saved";

            } else {
                $obj = MgMember::find($this->vid);
                $obj->mg_club_id = $this->mg_club_id;
                $obj->vname = Str::upper($this->vname);
                $obj->father = Str::ucfirst($this->father);
                $obj->mother = Str::ucfirst($this->mother);
                $obj->dob = $this->dob;
                $obj->aadhaar = $this->aadhaar;
                $obj->pan = $this->pan;
                $obj->mobile = $this->mobile;
                $obj->mobile_2 = $this->mobile_2;
                $obj->email = $this->email;
                $obj->address_1 = $this->address_1;
                $obj->address_2 = $this->address_2;
                $obj->city = $this->city;
                $obj->state = $this->state;
                $obj->pincode = $this->pincode;
                $obj->nominee = $this->nominee;
                $obj->n_mobile = $this->n_mobile;
                $obj->n_aadhaar = $this->n_aadhaar;
                $obj->active_id = $this->active_id ?: '0';
                $obj->user_id = Auth::id();
                $obj->save();
                $message = "Updated";
            }

            redirect()->to(route('mgClubs.members',$this->mg_club_id));
            $this->clearFields();
            return $message;
        }
        return '';
    }

    public function clearFields(): void
    {
        $this->mg_club_id = '';
        $this->vname = '';
        $this->father = '';
        $this->mother = '';
        $this->dob = (Carbon::parse(Carbon::now())->format('Y-m-d'));
        $this->aadhaar = '';
        $this->pan = '';
        $this->mobile = '';
        $this->mobile_2 = '';
        $this->email = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->city = '';
        $this->state = '';
        $this->pincode = '';
        $this->nominee = '';
        $this->n_mobile = '';
        $this->n_aadhaar = '';
        $this->active_id = '1';
        $this->searches = '';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = MgMember::find($id);
            $this->vid = $obj->id;
            $this->mg_club_id = $obj->mg_club_id;
            $this->vname = $obj->vname;
            $this->father = $obj->father;
            $this->mother = $obj->mother;
            $this->dob = $obj->dob;
            $this->aadhaar = $obj->aadhaar;
            $this->pan = $obj->pan;
            $this->mobile = $obj->mobile;
            $this->mobile_2 = $obj->mobile_2;
            $this->email = $obj->email;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->city = $obj->city;
            $this->state = $obj->state;
            $this->pincode = $obj->pincode;
            $this->nominee = $obj->nominee;
            $this->n_mobile = $obj->n_mobile;
            $this->n_aadhaar = $obj->n_aadhaar;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        $this->sortField = 'id';

        return MgMember::search($this->searches)
            ->where('mg_club_id', '=', $this->mg_club_id)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }


    public function render()
    {
        return view('livewire.magalir.mg-member.index')->with([
            'list' => $this->getList()
        ]);
    }
}
