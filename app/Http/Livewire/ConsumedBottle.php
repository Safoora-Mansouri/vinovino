<?php

namespace App\Http\Livewire;

use App\Models\BottleConsumed;
use App\Models\BottleInCellar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ConsumedBottle extends Component
{
    public $bottle_id, $cellar_id, $note;

    public function mount($cellar_id, $bottle_id)
    {
        $this->bottle_id = $bottle_id;
        $this->cellar_id = $cellar_id;

    }

    protected $rules = [
        // 'note' => 'required|string|max:255',
        'note' => 'string|max:255',
    ];

    protected $messages = [
        // 'note.required' => 'Le champ note est obligatoire.',
        'note.string' => 'Le champ note doit être une chaîne de caractères.',
        'note.max' => 'Le champ note ne doit pas dépasser :max caractères.',
    ];

    public function store()
    {
        $this->validate();
        // $userId=2;
        $userId = Auth::check() ? Auth::id() : null;

        BottleConsumed::create([
            'bottle_id'=>  $this->bottle_id,
            'cellar_id'=> $this->cellar_id,
            'note' => $this->note,
            'user_id' => $userId
        ]);
        
        $bottleInCellar = BottleInCellar::where('bottle_id', $this->bottle_id)
            ->where('cellar_id', $this->cellar_id)
            ->first();

        if ($bottleInCellar) {
            $bottleInCellar->delete();
            session()->flash('message', 'bouteille supprimer avec succès.');
        }else {
            session()->flash('message', 'bouteille supprimer avec échoué.');
        }

        // $this->emit('bottleDeleted');  // emit an event to notify that a bottle was deleted
    
        $this->reset('note');
    }
    public function render()
    {
        return view('livewire.consumed-bottle');
    }
}
