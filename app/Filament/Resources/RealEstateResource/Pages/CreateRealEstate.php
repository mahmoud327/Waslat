<?php

namespace App\Filament\Resources\RealEstateResource\Pages;

use App\Filament\Resources\RealEstateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRealEstate extends CreateRecord
{
    protected static string $resource = RealEstateResource::class;
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
