<?php

namespace App\Http\Livewire;

use App\Models\Auction;
use Livewire\Component;

class FilterAuctionSearchComponent extends Component
{
    public $tab = 'tab1'; // Default active tab
    public $search = '';

    public function render()
    {
        $auctions = Auction::query()
            ->when($this->tab === 'finished', function ($query) {

                return $query->where('start_date', '<', now());
            })
            ->when($this->tab === 'coming', function ($query) {
                // Add your tab2 filtering conditions here
                return $query->where('start_date', '>', now());
            })
            ->when($this->tab === 'enforcement', function ($query) {
                // Add your tab2 filtering conditions here
                return $query->where('seller_type','enforcement');
            })
            ->when($this->tab === 'zaman', function ($query) {
                // Add your tab2 filtering conditions here
                return $query->where('seller_type','zaman');
            })
            ->when($this->tab === 'underway', function ($query) {
                // Add your tab2 filtering conditions here
                return $query->where('start_date', '=', now());
            })
            ->when(!empty($this->search), function ($query) {
                // Add your search logic here
                return $query->whereHas('city', function ($q) {
                    $q->where('name->ar', 'like', '%' . $this->search . '%')
                        ->orwhere('name->en', 'like', '%' . $this->search . '%');
                });
            })
            ->get();

        return view('livewire.filter-auction-search-component', compact('auctions'));
    }
}
