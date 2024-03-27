<?php

namespace App\Livewire\Audit\Client;

use Aaran\Audit\Models\Biller;
use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\ClientDetail;
use Aaran\Taskmanager\Models\Turnover;
use App\Enums\Active;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;

    public Client $client;
    public string $mobile = '';
    public string $whatsapp = '';
    public string $email = '';
    public string $gstin = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $city = '';
    public string $state = '';
    public string $pincode = '';
    public string $gst_user = '';
    public string $gst_pass = '';
    public string $einvoice_user = '';
    public string $einvoice_pass = '';
    public string $eway_user = '';
    public string $eway_pass = '';
    public string $einvoice_api = '';
    public string $einvoice_api_pass = '';
    public string $eway_api = '';
    public string $eway_api_pass = '';
    public string $acc_email = '';
    public string $acc_email_pass = '';

    public $client_id = '';
    public bool $showModal;
    public $modalName;

    public function mount($id)
    {

        $this->clients = Client::all()->where('company_id','=',session()->get('company_id'));

        if ($id) {
            $this->client_id = $id;

        }
    }

    public function getClient(): void
    {
        $this->client = Client::find($this->client_id);
    }

    public function getClientDetails(): void
    {
        if ($this->client_id) {
            $obj = ClientDetail::where('client_id', '=', $this->client_id)->firstOrFail();
            $this->vid = $obj->id;
            $this->client_id = $obj->client_id;
            $this->vname = $obj->vname;
            $this->mobile = $obj->mobile;
            $this->whatsapp = $obj->whatsapp;
            $this->email = $obj->email;
            $this->gstin = $obj->gstin;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->city = $obj->city;
            $this->state = $obj->state;
            $this->pincode = $obj->pincode;
            $this->gst_user = $obj->gst_user;
            $this->gst_pass = $obj->gst_pass;
            $this->einvoice_user = $obj->einvoice_user;
            $this->einvoice_pass = $obj->einvoice_pass;
            $this->eway_user = $obj->eway_user;
            $this->eway_pass = $obj->eway_pass;
            $this->einvoice_api = $obj->einvoice_api;
            $this->einvoice_api_pass = $obj->einvoice_api_pass;
            $this->eway_api = $obj->eway_api;
            $this->eway_api_pass = $obj->eway_api_pass;
            $this->acc_email = $obj->acc_email;
            $this->acc_email_pass = $obj->acc_email_pass;
        }
    }


    public function showDetailModal($v): void
    {
        $this->showModal = true;

        switch ($v) {
            case 'contactDetails':
                $this->modalName = 'contactDetails';
                break;
            case 'address':
                $this->modalName = 'address';
                break;
            case 'gstPass':
                $this->modalName = 'gstPass';
                break;
            case 'einvoice':
                $this->modalName = 'einvoice';
                break;
            case 'eway':
                $this->modalName = 'eway';
                break;
            case 'einvoiceApi':
                $this->modalName = 'einvoiceApi';
                break;
            case 'ewayApi':
                $this->modalName = 'ewayApi';
                break;
            case 'accEmail':
                $this->modalName = 'accEmail';
                break;
        }
    }

    public function upsertDetails(): void
    {
        if ($this->vid) {
            $this->updateClientDetails();
        }
        $this->showModal = false;
    }


    public function updateClientDetails(): void
    {
        $obj = ClientDetail::find($this->vid);
        $obj->vname = $this->vname;
        $obj->mobile = $this->mobile;
        $obj->whatsapp = $this->whatsapp;
        $obj->email = $this->email;
        $obj->gstin = $this->gstin;
        $obj->address_1 = $this->address_1;
        $obj->address_2 = $this->address_2;
        $obj->city = $this->city;
        $obj->state = $this->state;
        $obj->pincode = $this->pincode;
        $obj->gst_user = $this->gst_user;
        $obj->gst_pass = $this->gst_pass;
        $obj->einvoice_user = $this->einvoice_user;
        $obj->einvoice_pass = $this->einvoice_pass;
        $obj->eway_user = $this->eway_user;
        $obj->eway_pass = $this->eway_pass;
        $obj->einvoice_api = $this->einvoice_api;
        $obj->einvoice_api_pass = $this->einvoice_api_pass;
        $obj->eway_api = $this->eway_api;
        $obj->eway_api_pass = $this->eway_api_pass;
        $obj->acc_email = $this->acc_email;
        $obj->acc_email_pass = $this->acc_email_pass;
        $obj->save();
    }


    public bool $billPlanModal;
    public $clients;

    public function showBillPlan(): void
    {

        $this->billPlanModal = true;
    }

    public string $companyx;
    public string $modex;

    public function createBillPlan(): void
    {
        if ($this->client_id) {
            Biller::create([
                'client_id' => $this->client_id,
                'vname' => $this->companyx,
                'mode' => $this->modex,
                'active_id' => Active::ACTIVE->value,
                'company_id' => session()->get('company_id'),
            ]);
        }

        $this->billPlanModal = false;
        $this->render();

    }

    public function deleteBillPlan($id): void
    {
        if ($id) {
            $obj = Biller::find($id);
            if ($obj) {
                $obj->delete();
            }
        }
        $this->render();
    }


    public function getBilling(): void
    {
        $this->billing = Biller::where('client_id', '=', $this->client_id)
            ->where('company_id', '=', session()->get('company_id'))->get();
    }

    public function getTurnover(): void
    {
        $this->turnover = Turnover::where('client_id', '=', $this->client_id)->get();
    }


    public function redirectTo(): void
    {
        redirect()->to(route('clients'));
    }

    public function reRender(): void
    {
        $this->render();
        $this->dispatch('refresh-turnover', id: $this->client_id);
    }

    public $turnover;
    public $billing;

    public function render()
    {
        $this->getClient();
        $this->getClientDetails();
        $this->getBilling();
        $this->getTurnover();

        return view('livewire.audit.client.show');
    }
}
