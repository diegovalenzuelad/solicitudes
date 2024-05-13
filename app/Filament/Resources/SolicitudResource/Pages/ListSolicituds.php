<?php

namespace App\Filament\Resources\SolicitudResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SolicitudResource;
use App\Filament\Resources\SolicitudResource\Widgets\SolicitudStatsOverview;

class ListSolicituds extends ListRecords
{
    protected static string $resource = SolicitudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return[
            SolicitudStatsOverview::class,
        ];
    }
}
