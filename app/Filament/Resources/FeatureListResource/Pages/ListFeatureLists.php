<?php

namespace App\Filament\Resources\FeatureListResource\Pages;

use App\Filament\Resources\FeatureListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeatureLists extends ListRecords
{
    protected static string $resource = FeatureListResource::class;

    use ListRecords\Concerns\Translatable;

    protected function getActions(): array
    {
        return [

            Actions\LocaleSwitcher::make(),

            Actions\CreateAction::make(),
        ];
    }
}
