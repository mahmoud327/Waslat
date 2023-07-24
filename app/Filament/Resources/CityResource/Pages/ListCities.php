<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCities extends ListRecords
{
    protected static string $resource = CityResource::class;
    use ListRecords\Concerns\Translatable;

    protected function getActions(): array
    {
        return [

            Actions\LocaleSwitcher::make(),

            Actions\CreateAction::make(),
        ];
    }
}
