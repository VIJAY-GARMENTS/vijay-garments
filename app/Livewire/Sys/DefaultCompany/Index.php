<?php

namespace App\Livewire\Sys\DefaultCompany;

use Aaran\Master\Models\Company;
use App\Models\DefaultCompany;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $companies;
    public $tenant_id;

    public bool $showCompanies = false;
    public company $company;
    public string $company_1 = '';

    public function mount()
    {
        $this->switchCompany();
        $this->setDefault(session()->get('tenant_id'));
    }

    public function getDefaultCompany(): void
    {
        $defaultCompany = DefaultCompany::find(1);


        if ($defaultCompany != null) {
            if ($defaultCompany->company_id != 0) {
                $this->company = Company::find($defaultCompany->company_id);
                $this->company_1 = $this->company->vname;
                session()->put('company_id', $defaultCompany->company_id);
                $this->showCompanies = false;
            } else {
                $this->company_1 = '';
                $this->showCompanies = true;
                $this->getAllCompanies();
            }
        } else {
            $this->showCompanies = true;
            $this->getAllCompanies();
        }
    }

    public
    function getAllCompanies(): void
    {
        $this->companies = Company::where('tenant_id', '=', session()->get('tenant_id'))->get();
        $this->showCompanies = true;
    }

    public
    function setDefault(
        $id
    ): void {
        $obj = DefaultCompany::find(1);
        if ($obj) {
            $obj->company_id = $id;
            $obj->tenant_id = session()->get('tenant_id');
            $obj->save();
        } else {
            DefaultCompany::create([
                'company_id' => $id,
                'tenant_id' => session()->get('tenant_id'),
                'acyear' => '1'
            ]);
        }
        $this->showCompanies = false;

        session()->put('company_id', $id);
    }

    public
    function switchCompany(): void
    {
        $obj = DefaultCompany::find(1);
        $obj->company_id = 0;
        $obj->save();

        session()->put('company_id', 0);

        $this->showCompanies = true;
    }

    public function render()
    {
        $this->getDefaultCompany();
        return view('livewire.sys.default-company.index');
    }
}
