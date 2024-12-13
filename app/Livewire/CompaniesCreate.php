<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompaniesCreate extends Component
{
    public $industry;
    public $companyName;

    protected $rules = [
        'companyName' => 'required|string|min:3|max:255|unique:companies,name',
        'industry' => 'required|string|min:3|max:255',
    ];

    public function submitForm()
    {
        $this->validate();

        // Criando nova empresa
        Company::create([
            'user_id' => Auth::id(),
            'name' => $this->companyName,
            'industry' => $this->industry,
        ]);

        return redirect('/companies');
    }


    public function render()
    {
        return view('livewire.companies-create');
    }
}
