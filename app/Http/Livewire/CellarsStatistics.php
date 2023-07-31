<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BottleInCellar;

class CellarsStatistics extends Component
{
    public function render()
    {
        $statistics = BottleInCellar::select('cellar_id')
            ->selectRaw('COUNT(*) as bottle_count')
            // ->selectRaw('SUM(consumed) as bottle_consumed')
            // ->selectRaw('SUM(deleted) as bottle_deleted')
            // ->selectRaw('MAX(updated_at) as last_modified')
            ->groupBy('cellar_id')
            ->get();

        return view('livewire.cellars-statistics', compact('statistics'));
    }
}
