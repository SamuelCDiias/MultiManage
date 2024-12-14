<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompaniesIndex extends Component
{
    // variáveis de acesso do livewire
    public $showForm = false;
    public $industry;
    public $companyName;
    public $companies = [];


    // captação de empresas
    public function mount()
    {
        $this->loadCompanies();
    }

    // carregar empresas
    public function loadCompanies()
    {
        $user = Auth::user();
        $this->companies = Company::where('user_id', $user->id)->get();
    }

    // formulário de criação

    // mostrar o formulário
    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    // validações
    protected $rules = [
        'companyName' => 'required|string|min:3|max:255|unique:companies,name',
        'industry' => 'required|string|min:3|max:255',
    ];

    // criar empresa
    public function createCompany()
    {
        $this->validate();

        // Criando nova empresa
        Company::create([
            'user_id' => Auth::id(),
            'name' => $this->companyName,
            'industry' => $this->industry,
        ]);
        $this->clearForm();
        $this->loadCompanies();

        session()->flash('message', 'Empresa criada com sucesso');
    }

    // limpar formulário
    public function clearForm()
    {
        $this->companyName = '';
        $this->industry = '';
        $this->showForm = false;

        return $this->mount();
    }


    public function selectCompany($companyId)
    {
        dd($companyId);
    }

    public function render()
    {
        return view('livewire.companies-index', ['companies' => $this->companies]);
    }
}
