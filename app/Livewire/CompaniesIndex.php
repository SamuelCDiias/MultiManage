<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesIndex extends Component
{
    use WithPagination;


    // variáveis de acesso do livewire
    public $showForm = false;

    // validação
    #[Validate('required|string|min:3|max:255')]
    public $industry;

    #[Validate('required|string|min:3|max:255|unique:companies,name')]
    public $companyName;

    public $confirmDelete = false;
    public $companyIdtoDelete;

    // formulário de criação

    // mostrar o formulário
    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    // criar empresa
    public function createCompany()
    {
        $this->validate();

        // Criando nova empresa
        $company = Company::create([
            'user_id' => Auth::id(),
            'name' => $this->companyName,
            'industry' => $this->industry,
        ]);


        // evento de confirmação
        if ($company->wasRecentlyCreated) {

            // create an event
            $this->dispatch('contactAdded');

            // success notification
            $this->dispatch(
                'notification',
                type: 'success',
                title: 'Company created successfully',
                position: 'center'
            );
        } else {
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'The company already exists',
                position: 'center'
            );
        }
        $this->clearForm();
    }

    public function deleteCompany($companyId)
    {

        $this->companyIdtoDelete = $companyId;
        $this->confirmDelete = true;
    }

    public function deleteConfirmed()
    {

        $company = Company::findOrFail($this->companyIdtoDelete);
        $company->delete();

        session()->flash('message', 'Empresa excluída com sucesso');
        $this->confirmDelete = false;

        // Atualizar a listagem de empresas
        return redirect()->route('companies.index');
    }

    public function deleteCanceled()
    {
        $this->confirmDelete = false;
    }


    // limpar formulário
    public function clearForm()
    {
        $this->companyName = '';
        $this->industry = '';
        $this->showForm = false;
    }


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

        $companies = Company::where('user_id', Auth::id())->paginate(5);
        return view('livewire.companies-index', compact('companies'));
    }
}
