<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bottle;

class SearchAdvancedResults extends Component
{
    use WithPagination;

    public $unlisted = false;
    public $showSearch = false;
    public $results = [];
    public $component = 'bottles';

    protected $queryString = ['search', 'priceMin', 'priceMax', 'description', 'page'];

    public $search;
    public $priceMin;
    public $priceMax;
    public $description;

    protected $listeners = ['toggleSearch', 'searchPerformance' => 'performSearch', 'Filter' => 'FilterBottles'];

    public function mount()
{
    $this->search = request()->query('search', null);
    $this->priceMin = request()->query('priceMin', null);
    $this->priceMax = request()->query('priceMax', null);
    $this->description = request()->query('description', null);
}


    public function performSearch()
    {
        // The logic has been moved to render(), so this method can be empty or removed
    }

    public function render()
{
    // Begin the query
    $query = Bottle::query();

    if ($this->unlisted) {
        $query->where('unlisted', true);
    } else {
        $query->where('unlisted', false);
    }

    // Apply search filters
    if ($this->search && $this->search !== 'null') {
        $query->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                ->orWhere('code_saq', 'LIKE', $this->search . '%');
        });
        if (is_numeric($this->search)) {
            $query->where(function ($query) {
                $query->where('price', '>=', (float)$this->search)
                    ->where('price', '<', (float)$this->search + 1);
            });
        }
    }

    if ($this->description && $this->description !== 'null') {
        $query->where('description', 'LIKE', '%' . $this->description . '%');
    }

    if ($this->priceMin !== null && $this->priceMin > 0) {
        $query->where('price', '>=', (float) $this->priceMin);
    }
    
    if ($this->priceMax !== null && $this->priceMax > 0) {
        $query->where('price', '<=', (float) $this->priceMax);
    }
    
    // Order and paginate
    $bottles = $query->orderBy('name')->paginate(9);

    // Return the view
    return view('livewire.many-bottles', ['bottles' => $bottles, 'filter' => $this->unlisted])->layout('layouts.app');
}
// private function buildQuery()
// {
//     $query = Bottle::query()->where('unlisted', false);

//     if ($this->search && $this->search !== 'null') {
//         $query->where(function ($q) {
//             $q->where('name', 'LIKE', '%' . $this->search . '%')
//                 ->orWhere('description', 'LIKE', '%' . $this->search . '%')
//                 ->orWhere('code_saq', 'LIKE', $this->search . '%');
//         });
//     }

//     if ($this->description && $this->description !== 'null') {
//         $query->where('description', 'LIKE', '%' . $this->description . '%');
//     }

//     if ($this->priceMin !== null && $this->priceMin > 0) {
//         $query->where('price', '>=', (float) $this->priceMin);
//     }

//     if ($this->priceMax !== null && $this->priceMax > 0) {
//         $query->where('price', '<=', (float) $this->priceMax);
//     }

//     return $query;
// }

// public function render()
// {
//     $query = $this->buildQuery();

//     $bottles = $query->orderBy('name')->paginate(9);

//     return view('livewire.many-bottles', ['bottles' => $bottles, 'filter' => $this->unlisted])->layout('layouts.app');
// }


    public function searchPerformed($search)
    {
        $this->search = $search;
    }

    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch; // Toggle the visibility
    }

    public function FilterBottles($newFilter)
    {
        $this->unlisted = $newFilter;
        $this->resetPage();
    }
}
