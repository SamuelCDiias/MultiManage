<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Models\CompanyAccess;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesShow extends Component
{
    use WithPagination;

    public function createCompany()
    {
        $this->dispatch('company-create');
    }

    public function selectCompany($companyId)
    {
        session(['active_company' => $companyId]);
        return redirect()->route('company.dashboard');
    }


    #[On('refresh')]
    public function refresh()
    {
        $this->resetPage();
    }

    public function getAllCompanies(){

        $userId = Auth::id();

        $companyAccess = CompanyAccess::where('user_id', $userId);

        $companyIds = $companyAccess->pluck('company_id');

        $companies = Company::whereIn('id', $companyIds)->paginate(5);

        return $companies;

    }

    public function render()
    {
        $companies = $this->getAllCompanies();

        return view('livewire.company.companies-show', compact('companies'));
    }
}
