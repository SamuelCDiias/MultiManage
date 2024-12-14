<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyAccess extends Component
{

    public function selectCompany($companyId)
    {
        $company = Company::where('id', $companyId)->where('user_id', Auth::id())->get();

        if (!$company) {
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Empresa não encontrada ou não pertence a você.',
                position: 'center'
            );
            return;
        }

        session(['active_company' => $companyId]);


        return redirect()->route('dashboard');
    }



    public function render()
    {
        return view('livewire.company-access');
    }
}
