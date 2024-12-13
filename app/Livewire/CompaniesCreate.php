<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompaniesCreate extends Component
{

    public $showForm = false;
    public $industry;
    public $companyName;

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function submitForm()
    {
        $this->validate();


        dd([
            'user_id' => Auth::id(),
            'name' => $this->companyName,
            'industry' => $this->industry,
        ]);

        // Criando nova empresa
        Company::create([
            'user_id' => Auth::id(),
            'name' => $this->companyName,
            'industry' => $this->industry,
        ]);

        $this->clearForm();
    }

    public function clearForm()
    {
        // Resetar campos do formulário
        $this->companyName = '';
        $this->industry = '';
        $this->showForm = false;

        // Recarregar a lista de empresas
        $this->mount();
    }



    public function render()
    {
        return view('livewire.companies-create');
    }
}
