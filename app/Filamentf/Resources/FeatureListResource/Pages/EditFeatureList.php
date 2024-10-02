<?php

namespace App\Filament\Resources\FeatureListResource\Pages;

use App\Filament\Resources\FeatureListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeatureList extends EditRecord
{
    protected static string $resource = FeatureListResource::class;

  
    use EditRecord\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
