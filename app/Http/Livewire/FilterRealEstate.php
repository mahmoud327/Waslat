<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\RealEstate;
use Livewire\Component;

class FilterRealEstate extends Component
{

    public $tab = 'tab1'; // Default active tab
    public $city = ''; // Default active tab
    public $search = '';

    public function mount($city_id)
    {
        $this->city =  City::select('id', 'name')->find($city_id);
    }
    public function render()
    {
        $real_estates = RealEstate::query()
            ->when($this->tab === 'buying', function ($query) {

                return $query->wherePurpose('buying');
            })
            ->when($this->tab === 'Hire', function ($query) {
                // Add your tab2 filtering conditions here
                return $query->wherePurpose('Hire');
            })

            ->when(!empty($this->search), function ($query) {
                // Add your search logic here
                return $query->where('description->ar', 'like', '%' . $this->search . '%')
                    ->orwhere('description->en', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.filter-real-estate', [
            'city' => $this->city,
            'real_estates' => $real_estates
        ]);
    }
}
