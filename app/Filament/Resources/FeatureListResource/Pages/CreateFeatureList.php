<?php

namespace App\Filament\Resources\FeatureListResource\Pages;

use App\Filament\Resources\FeatureListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeatureList extends CreateRecord
{
    protected static string $resource = FeatureListResource::class;

    use CreateRecord\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
