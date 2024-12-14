<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyDelete extends Component
{

    public $confirmDelete = false;
    public $companyIdtoDelete;

    #[On('company-delete')]
    public function deleteCompany($companyId)
    {
        if($this->confirmDelete){
            return;
        }

        $this->companyIdtoDelete = $companyId;
        $this->confirmDelete = true;

    }

    public function deleteConfirmed()
    {

        $company = Company::findOrFail($this->companyIdtoDelete);
        $company->delete();

        session()->flash('message', 'Empresa excluída com sucesso');

        $this->confirmDelete = false;

        return redirect()->route('companies.show');
    }

    public function deleteCanceled()
    {
        $this->confirmDelete = false;
    }


    public function render()
    {
        return view('livewire.company-delete');
    }
}