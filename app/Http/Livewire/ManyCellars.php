<?php

namespace App\Http\Livewire;

use App\Models\Cellar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManyCellars extends Component
{
    public $cellars;
    public $search = '';
    public $userId;
    public $showSearch = false;

    protected $listeners = ['toggleSearch','searchPerformed'];

    public function mount()
    {
        $this->userId = Auth::check() ? Auth::id() : null;
        $this->loadCellars();
       
    }

    public function loadCellars()
    {
        if (!empty($this->search)) {
            $this->cellars = Cellar::where('name', 'LIKE', '%' . $this->search . '%')
                ->where('user_id', $this->userId)->get();
        } else {
            $this->cellars = Cellar::where('user_id', $this->userId)->get();
        }
    }

    public function render()
    {
        return view('livewire.many-cellars', ['cellars' => $this->cellars]);
    }

    public function searchPerformed($search)
    {
        $this->search = $search;
        $this->loadCellars();
    }

    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch; // Toggle the visibility
    }
}
