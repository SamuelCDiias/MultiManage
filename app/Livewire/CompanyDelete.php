<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyDelete extends Component
{





    public $confirmDelete = false;
    public $companyIdtoDelete;

    #[On('company-delete')]
    public function deleteCompany($companyId)
    {
        if (!$this->confirmDelete) {
            $this->companyIdtoDelete = $companyId;
            $this->confirmDelete = true;
        }
    }

    public function deleteConfirmed()
    {

        $company = Company::findOrFail($this->companyIdtoDelete);

        if (Gate::denies('is-admin', $this->companyIdtoDelete)) {

            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Access denied',
                position: 'center'
            );

            return;
        }

        $company->delete();

        session()->forget('active_company');

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
