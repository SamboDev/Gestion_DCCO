<?php

namespace App\Filament\Resources\ReporteDocenteMateriaResource\Pages;

use App\Filament\Resources\ReporteDocenteMateria;
use App\Models\DocenteMateria;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ListReporteDocenteMaterias extends ListRecords
{
    protected static string $resource = ReporteDocenteMateria::class;

    protected static ?string $title = 'Reporte - Docentes por Materias';

    protected static ?string $navigationGroup = 'Reportes';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ButtonAction::make('pdf')->action(fn ()=> redirect()->route('download.tes', ['model' => DocenteMateria::class, 'view_name'=> 'docentepormateria'])),
        ];
    }
}
