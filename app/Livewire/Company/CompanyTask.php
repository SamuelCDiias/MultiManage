<?php

namespace App\Livewire\Company;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CompanyTask extends Component
{
    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('nullable|string')]
    public $description;

    #[Validate('required|in: pendente,em andamento,concluida')]
    public $status;

    #[Validate('nullable|date')]
    public $due_date;

    public $toggleForm = false;



    public function create()
    {
        Task::create([
            'id' => (string) Str::uuid(),
            'company_id' => session('active_company'),
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status ?: 'pendente',
            'due_date' => $this->due_date,
        ]);

        $this->showForm();

        $this->resetInputFields();

        $this->dispatch(
            'notification',
            type: 'success',
            title: 'Task created successfully',
            position: 'center'
        );

        $this->dispatch('refresh');
    }

    #[On('createTask')]
    public function showForm()
    {
        $this->toggleForm = !$this->toggleForm;
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
        ]);

        $this->toggleForm();

        $this->resetInputFields();
        $this->dispatch('refresh');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->status = '';
        $this->due_date = null;
    }


    public function delete($taskId)
    {
        $this->dispatch('task-delete', $taskId);
    }

    #[On('refresh')]
    public function render()
    {
        $companyId = session('active_company');
        $tasks = Task::where('company_id', $companyId)->get();
        return view('livewire.company.company-task', compact('tasks'));
    }
}
