<?php

namespace App\Filament\Resources\CoordinadoresAreaResource\Pages;

use App\Filament\Resources\CoordinadoresAreaResource;
use App\Models\Coordinador;
use App\Models\Coordinadors;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoordinadoresAreas extends ListRecords
{
    protected static string $resource = CoordinadoresAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ButtonAction::make('pdf')->action(fn ()=> redirect()->route('download.tes', ['model' =>Coordinador::class, 'view_name'=> 'cordinador'])),
        ];
    }
}
