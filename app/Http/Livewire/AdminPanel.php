<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminPanel extends Component
{
    public $page;

    public function mount($page = 'home-admin-panel')
    {
       
        $this->page = $page;
    }
    public function render()
    {
        return view('livewire.admin-panel',['page', $this->page]);
    }
}
