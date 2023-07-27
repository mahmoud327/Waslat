<?php

namespace App\Filament\Widgets;

use App\Models\Auction;
use App\Models\RealEstate;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            //
            Card::make(trans('lang.users'), User::count()),
            Card::make(trans('lang.real estates.real estates'), RealEstate::count()),
            Card::make(trans('lang.auctions.auctions'), Auction::count()),

        ];
    }
}
