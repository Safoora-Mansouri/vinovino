<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use App\Models\Cellar;
use App\Models\BottleInCellar;

class AddBottlesToCellar extends Component
{
    public $bottle_id,$unliste, $cellar_id, $quantity, $bottle;

    public function mount($bottle_id,$unliste)
    {
        $this->bottle_id = $bottle_id;
        $this->unliste = $unliste;
        $this->cellar_id = 0; 

        // Set a default value here, it can be any value that doesn't exist as an ID in your 'cellars' table.
    }


    public function store()
{

    $bottleInCellar = BottleInCellar::where('bottle_id', $this->bottle_id)
            ->where('cellar_id', $this->cellar_id)
            ->first();


    // if (!$bottleInCellar) {
        if($this->unliste=="unliste"){
            
            BottleInCellar::create([
                'unlisted_bottle_id' => $this->bottle_id,
                'quantity' => $this->quantity,
                'cellar_id' => $this->cellar_id,
            ]);
        }else{
            BottleInCellar::create([
                'bottle_id' => $this->bottle_id,
                'quantity' => $this->quantity,
                'cellar_id' => $this->cellar_id,
            ]);
        }
    

    session()->flash('message', 'Ajouter bottles succée.');
// }else{
//     session()->flash('message-error', 'Vous avez déjà cette bouteille');
// }

}


    public function render()
    {
        $cellars = Cellar::all();
        return view('livewire.add-bottles-to-cellar', ['cellars' => $cellars]);
    }
}
