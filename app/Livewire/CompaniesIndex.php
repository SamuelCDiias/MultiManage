<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class CompaniesIndex extends Component
{
    // variáveis de acesso do livewire
    public $showForm = false;
    public $industry;
    public $companyName;
    public $companies = [];

    // validação
    protected $rules = [
        'companyName' => 'required|string|max:255',
        'industry' => 'required|string|max:255'
    ];

    // captação de empresas
    public function mount()
    {
        $user = Auth::user();
        $this->companies = Company::where('user_id', $user->id)->get();
    }

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
        return view('livewire.companies-index',['companies' => $this->companies]);
    }
}
