<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesShow extends Component
{
    use WithPagination;

    public function createCompany(){
        $this->dispatch('company-create');
    }

    public function deleteCompany($companyId) {

        $this->dispatch('company-delete', $companyId);
    }

    public function selectCompany($companyId){

        session(['active_company' => $companyId]);
        return redirect()->route('company.dashboard');
    }


    #[On('refresh')]
    public function refresh(){
        $this->resetPage();
    }


    public function render()
    {
        $companies = Company::where('user_id', Auth::id())->paginate(5);
        return view('livewire.companies-show', compact('companies'));
    }
}
