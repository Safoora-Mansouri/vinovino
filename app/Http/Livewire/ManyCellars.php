<?php

namespace App\Http\Livewire;

use App\Models\BottleConsumed;
use App\Models\BottleInCellar;
use App\Models\Cellar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManyCellars extends Component
{
    public $cellars;
    public $search = '';
    public $userId;
    public $cellar_name;
    public $updateMode = 0;
    public $showSearch = false;

    protected $rules = [
        'cellar_name' => 'required|string|max:255',
    ];

    protected $messages = [
        'cellar_name.required' => 'Le champ Nom est obligatoire.',
        'cellar_name.string' => 'Le champ Nom doit être une chaîne de caractères.',
        'cellar_name.max' => 'Le champ Nom ne doit pas dépasser :max caractères.',
    ];

    protected $listeners = [
        'toggleSearch',
        'searchPerformed',
         'cellarDeleted' => 'loadCellars',
        'cellarUpdated' => 'updateCellar'
    ];

    public function mount()
    {
        $this->cellar_name = "";
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

    public function updateCellarMode($cellarId)
{
    $cellar = Cellar::where('id', $cellarId)->first();
    if ($cellar) {
        $this->cellar_name = $cellar->name; // Set the input field to the current name of the cellar
        $this->updateMode = $cellarId; // Set the update mode to the cellar ID
    }
}


    public function updateCellar()
    {
        $this->updateMode = 0;
        $this->loadCellars();
    }

    public function editCellar($cellarId)
    {
        $this->validate();
        $cellar = Cellar::where('id', $cellarId)->first();
        if ($cellar) {
            $cellar->name = $this->cellar_name;
            $cellar->save();
            $this->emit('cellarUpdated');
            $this->cellar_name = ""; // Reset the input field
            $this->updateMode = 0; // Exit update mode
        }
    }

    public function deleteCellar($cellarId)
    {
        // Delete associated bottles in the cellar
        BottleInCellar::where('cellar_id', $cellarId)->forceDelete();
        BottleConsumed::where('cellar_id', $cellarId)->forceDelete();

        // Delete the cellar itself
        $cellar = Cellar::find($cellarId);
        if ($cellar) {
            $cellar->delete();
        }
        $this->emit('cellarDeleted');
    }

    public function render()
    {
        return view('livewire.many-cellars', ['cellars' => $this->cellars, 'updateMode' => $this->updateMode]);
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
