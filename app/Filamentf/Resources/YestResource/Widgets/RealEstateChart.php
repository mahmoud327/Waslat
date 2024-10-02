<?php

namespace App\Filament\Resources\YestResource\Widgets;

use App\Models\RealEstate;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class RealEstateChart extends BarChartWidget
{
    protected static ?string $heading = 'Chart';
    protected function getData(): array {
        $reeale_states = RealEstate::select('created_at')->get()->groupBy(function($reeale_states) {
            return Carbon::parse($reeale_states->created_at)->format('F');
        });
        $quantities = [];
        foreach ($reeale_states as $reeale_state => $value) {
            array_push($quantities, $value->count());
        }
        return [
            'datasets' => [
                [
                    'label' =>trans('dashboard.products.products'),
                    'data' => $quantities,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $reeale_states->keys(),
        ];
    }
}
