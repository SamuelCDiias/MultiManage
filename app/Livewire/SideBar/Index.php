<?php

namespace App\Livewire\SideBar;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function login(){
        if(Auth::user()){
            return redirect()->route('companies.show');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function register(){
        if(Auth::user()){
            return redirect()->route('companies.show');
        }
        else{
            return redirect()->route('register');
        }
    }


    public function render()
    {
        return view('livewire.sidebar.index')->layout('components.layouts.guest');
    }
}
