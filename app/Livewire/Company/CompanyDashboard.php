<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyDashboard extends Component
{
    public $company;

    public function mount(){
        $companyId = session('active_company');
        $this->company = Company::findOrFail($companyId);
    }


    public function userAccess(){
        $this->dispatch('user-select');
    }

    public function companyLogout(){
        session()->forget('active_company');
        return redirect()->route('companies.show');
    }

    public function createTask() {
        $this->dispatch('createTask', session('active_company'));
    }

    #[On('refresh')]
    public function render()
    {
        $tasks = Task::where('company_id', $this->company->id)->get();

        return view('livewire.company.company-dashboard', ['company' => $this->company, 'tasks' => $tasks]);
    }
}
