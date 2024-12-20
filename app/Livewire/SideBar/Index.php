<?php

namespace App\Livewire\SideBar;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.sidebar.index')->layout('components.layouts.guest');
    }
}
