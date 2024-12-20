<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\CompanyAccess;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class UserCompanyDelete extends Component
{

    public $confirmDelete = false;
    public $userIdToDelete;

    #[On('user-delete-to-company')]
    public function deleteUser($userId)
    {
        if (!$this->confirmDelete) {
            $this->userIdToDelete = $userId;
            $this->confirmDelete = true;
        }
    }

    public function deleteConfirmed()
    {

        $userAccess = CompanyAccess::findOrFail($this->userIdToDelete);

        if (Gate::denies('is-admin', $this->userIdToDelete)) {

            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Access denied',
                position: 'center'
            );

            return;
        }

        $userAccess->delete();

        $this->dispatch('user-deleteded-for-company');

        $this->confirmDelete = false;

        // Notifica o sucesso
        $this->dispatch(
            'notification',
            type: 'success',
            title: 'User removed successfully',
            position: 'center'
        );
    }

    public function deleteCanceled()
    {
        $this->confirmDelete = false;
    }


    public function render()
    {
        return view('livewire.user-company-delete');
    }
}
