<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\CompanyAccess;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyConfiguration extends Component
{
    public $company;

    public $companyAccess;


    public function removeUser(){
        
    }


    public function mount()
    {
        $companyId = session('active_company');

        $this->company = Company::find($companyId);

        $this->companyAccess = CompanyAccess::where('company_id', $companyId)
            ->with('user')
            ->get();
    }



    public function render()
    {

        return view('livewire.company-configuration', ['company' => $this->company, 'companyAccess' => $this->companyAccess]);
    }
}
