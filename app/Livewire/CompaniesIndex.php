<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class CompaniesIndex extends Component
{
    // variáveis de acesso do livewire
    public $companies = [];

    // captação de empresas
    public function mount()
    {
        $user = Auth::user();
        $this->companies = Company::where('user_id', $user->id)->get();
    }

    public function render()
    {
        return view('livewire.companies-index', ['companies' => $this->companies]);
    }
}
