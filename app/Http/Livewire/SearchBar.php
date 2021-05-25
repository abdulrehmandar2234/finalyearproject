<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Spatie\Searchable\Search;

class SearchBar extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];
        if (strlen($this->search) >= 2) {
            $searchResults = (new Search())
                ->registerModel(Product::class, 'title')
                ->search($this->search);
        }
        return view('livewire.search-bar', [
            'searchResults' => $searchResults,
        ]);
    }
}
