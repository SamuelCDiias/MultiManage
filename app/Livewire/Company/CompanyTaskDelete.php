<?php

namespace App\Livewire\Company;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyTaskDelete extends Component
{
    public $confirmDelete = false;
    public $taskIdToDelete;

    #[On('task-delete')]
    public function taskDelete($taskId){
        if (!$this->confirmDelete) {
            $this->taskIdToDelete = $taskId;
            $this->confirmDelete = true;
        }
    }

    public function taskDeleteConfirmed(){
        Task::findOrFail($this->taskIdToDelete)->delete();
        $this->confirmDelete = false;
        $this->dispatch(
            'notification',
            type: 'success',
            title: 'Task deleted successfully',
            position: 'center'
        );
        $this->dispatch('refresh');
    }

    public function taskDeleteCanceled(){
        $this->confirmDelete = false;
    }


    public function render()
    {
        return view('livewire.company.company-task-delete');
    }
}
