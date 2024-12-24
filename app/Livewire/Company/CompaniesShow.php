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

    public $nameFilter = '';

    public function createCompany()
    {
        $this->dispatch('company-create');
    }

    public function selectCompany($companyId)
    {
        // session(['active_company' => $companyId]);
        session()->put('active_company', $companyId);

        // return redirect()->route('company.dashboard');
        return redirect()->to(route('company.dashboard'));
        // return $this->redirect(route('company.dashboard'), navigate:true);
    }

    public function getAllCompanies()
    {

        $userId = Auth::id();

        $companyAccess = CompanyAccess::where('user_id', $userId);

        $companyIds = $companyAccess->pluck('company_id');

        $companies = Company::whereIn('id', $companyIds);

        if ($this->nameFilter) {
            $companies->where(function ($query) {
                $query->where('name', 'ILIKE', '%' . $this->nameFilter . '%')
                    ->orWhere('industry', 'ILIKE', '%' . $this->nameFilter . '%');
            });
        }

        return $companies->paginate(5);
    }

    #[On('refresh')]
    public function render()
    {
        $companies = $this->getAllCompanies();

        return view('livewire.company.companies-show', compact('companies'));
    }
}
