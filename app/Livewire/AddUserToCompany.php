<?php

namespace App\Livewire;

use App\Models\CompanyAccess;
use App\Models\User;
use Livewire\Component;

class AddUserToCompany extends Component
{

    public $showForm = false;
    public $users;
    public $companies;

    public $user_id = '';
    public $role = '';


    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'role' => 'required|in:admin,user,manager'
    ];


    public function toggleForm()
    {
        // abre e fecha formulário
        $this->showForm = !$this->showForm;
    }

    public function mount()
    {
        // coleta os usuários
        $this->users = User::all();
    }


    public function selectUser()
    {
        //valida
        $this->validate();

        // pega a empresa logada
        $companyId = session('active_company');

        // Verificar se o usuário já está vinculado a empresa
        $existing_access = CompanyAccess::where('user_id', $this->user_id)
            ->where('company_id', $companyId)
            ->exists();

        // se encontrar esse acesso, emite o error
        if ($existing_access) {
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'The user is already linked to a company',
                position: 'center'
            );

            return;
        }

        // Cria o registro na tabela company_access
        CompanyAccess::create([
            'user_id' => $this->user_id,
            'company_id' => $companyId,
            'role' => $this->role
        ]);

        // limpa o campo
        $this->reset(['user_id', 'role']);

        // fecha o formulário
        $this->toggleForm();

        // emitir o evento de sucesso
        $this->dispatch(
            'notification',
            type: 'success',
            title: 'User linked successfully',
            position: 'center'
        );

        $this->dispatch('refresh');
    }


    public function render()
    {
        return view('livewire.add-user-to-company');
    }
}
