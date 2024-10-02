<?php

namespace App\Filament\Resources\RealEstateResource\Pages;

use App\Filament\Resources\RealEstateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealEstate extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = RealEstateResource::class;



    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
