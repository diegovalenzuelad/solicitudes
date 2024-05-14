<?php

namespace App\Filament\Resources\SolicitudResource\Widgets;

use App\Models\Solicitud;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SolicitudStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de solicitudes', Solicitud::all()->count()),
                           
            //Stat::make('Bounce rate', '21%')
            //->description('7% decrease')
            //->descriptionIcon('heroicon-m-arrow-trending-down')
            //->color('danger'),
            //Stat::make('Average time on page', '3:12'),
        ];
    }
}
