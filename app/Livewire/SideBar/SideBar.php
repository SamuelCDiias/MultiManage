<?php

namespace App\Livewire\SideBar;

use Livewire\Component;

class SideBar extends Component
{
    public function showDashboard(){
        return $this->redirect('/company/dashboard', navigate:true);
    }

    public function showConfiguration(){
        return $this->redirect('/company/configuration', navigate:true);
    }

    public function showCompanies(){
        return $this->redirect('/companies', navigate:true);
    }



    public function render()
    {
        return view('livewire.sidebar.side-bar');
    }
}
