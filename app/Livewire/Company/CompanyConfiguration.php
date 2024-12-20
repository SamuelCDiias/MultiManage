<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Models\CompanyAccess;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyConfiguration extends Component
{
    public $company;

    public $companyAccess;

    public function mount()
    {
        $companyId = session('active_company');

        $this->company = Company::find($companyId);

        $this->companyAccess = CompanyAccess::where('company_id', $companyId)
        ->with('user')
        ->get();
    }

    public function deleteCompany($companyId)
    {
        $this->dispatch('company-delete', $companyId);
    }

    public function deleteUser($userId){
        $this->dispatch('user-delete-to-company', $userId);
    }

    #[On('refresh')]
    public function render()
    {
        return view('livewire.company.company-configuration', ['company' => $this->company, 'companyAccess' => $this->companyAccess]);
    }
}
