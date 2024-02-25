<?php

namespace App\Filament\Resources\MateriaPorAreasDeConocimientoResource\Pages;

use App\Filament\Resources\MateriaPorAreasDeConocimientoResource;
use App\Models\Materia;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMateriaPorAreasDeConocimientos extends ListRecords
{
    protected static string $resource = MateriaPorAreasDeConocimientoResource::class;

    protected static ?string $title = 'Reporte - Materias por Areas de Conocimiento';

    protected static ?string $navigationGroup = 'Reportes';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ButtonAction::make('pdf')->action(fn ()=> redirect()->route('download.tes', ['model' => Materia::class, 'view_name'=> 'materiaAC'])),

        ];
    }
}
