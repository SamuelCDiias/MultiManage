<?php

namespace App\Livewire\Users;

use App\Models\CompanyAccess;
use Livewire\Attributes\On;
use Livewire\Component;

class UserCompanyDelete extends Component
{

    public $confirmDelete = false;
    public $userIdToDelete;
    public $company;

    #[On('user-delete-to-company')]
    public function deleteUser($userId)
    {
        if (!$this->confirmDelete) {
            $this->userIdToDelete = $userId;
            $this->confirmDelete = true;
            $this->company = session('active_company');
        }
    }

    public function deleteConfirmed()
    {
        $userAccess = CompanyAccess::where('user_id', $this->userIdToDelete)->where('company_id', $this->company);

        $userAccess->delete();

        $this->confirmDelete = false;

        // Notifica o sucesso
        $this->dispatch(
            'notification',
            type: 'success',
            title: 'User removed successfully',
            position: 'center'
        );

        $this->dispatch('refresh');

    }

    public function deleteCanceled()
    {
        $this->confirmDelete = false;
    }


    public function render()
    {
        return view('livewire.users.user-company-delete');
    }
}
