<?php

namespace App\Livewire\SideBar;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{


public function logout(){

    Auth::logout();
    session()->invalidate();
     return redirect('/');

    }

    public function render()
    {
        return view('livewire.sidebar.logout');
    }
}
