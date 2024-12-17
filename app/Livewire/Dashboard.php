<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class Dashboard extends Component
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


    public function render()
    {
        return view('livewire.dashboard', ['company' => $this->company]);
    }
}
