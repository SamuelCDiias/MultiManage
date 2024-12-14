<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CompanyCreate extends Component
{
    // variáveis de acesso do livewire

    // validação
    #[Validate('required|string|min:3|max:255')]
    public $industry;

    #[Validate('required|string|min:3|max:255|unique:companies,name')]
    public $companyName;

    public $showForm = false;

    // criar empresa
    #[On('company-create')]
    public function showForm()
    {
        $this->showForm = true;
    }

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

    // limpar formulário
    public function clearForm()
    {
        $this->companyName = '';
        $this->industry = '';
        $this->showForm = false;
        $this->dispatch('refresh');
    }


    public function render()
    {
        return view('livewire.company-create');
    }
}
