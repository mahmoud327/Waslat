<?php

namespace App\Filament\Resources\AuctionResource\Pages;

use App\Filament\Resources\AuctionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuctions extends ListRecords
{
    protected static string $resource = AuctionResource::class;

    use ListRecords\Concerns\Translatable;

    protected function getActions(): array
    {
        return [

            Actions\LocaleSwitcher::make(),

            Actions\CreateAction::make(),
        ];
    }
}
