<?php

namespace App\Livewire;

use Livewire\Component;

class CompaniesIndex extends Component
{
    public $showForm = true;

    public function mount(){

    }

    public function toggleForm(){
        $this->showForm = !$this->showForm;
    }

    public function submitForm(){

    }






    public function render()
    {
        return view('livewire.companies-index');
    }
}
