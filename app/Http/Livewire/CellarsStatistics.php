<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BottleInCellar;
use Illuminate\Support\Facades\DB;

class CellarsStatistics extends Component
{
    public function render()
    {

        $cellars_statistics = DB::table('bottle_in_cellars')
        ->join('cellars', 'cellars.id', '=', 'bottle_in_cellars.cellar_id')
        ->select('cellars.id as cellar_id', 'cellars.name', 'cellars.user_id')
        ->selectRaw('COUNT(bottle_in_cellars.id) as bottle_count')
        ->selectRaw('SUM(CASE WHEN bottle_in_cellars.deleted_at IS NOT NULL THEN 1 ELSE 0 END) as bottle_deleted')
        ->selectRaw('MAX(bottle_in_cellars.updated_at) as last_modified')
        ->groupBy('cellars.id', 'cellars.name', 'cellars.user_id')
        ->get();

        // $$cellars_statistics = BottleInCellar::select('cellar_id', 'name', 'user_id')
        //     ->selectRaw('COUNT(*) as bottle_count')
        //     ->with("cellars")
        //     // ->selectRaw('SUM(consumed) as bottle_consumed')
        //     ->selectRaw('SUM(deleted_at) as bottle_deleted')
        //     ->selectRaw('MAX(updated_at) as last_modified')
        //     ->groupBy('cellar_id')
        //     ->get();

        return view('livewire.cellars-statistics', compact('cellars_statistics'));
    }
}
