<?php

namespace App\Filament\Resources\ListaDocentesResource\Pages;

use App\Filament\Resources\ListaDocentesResource;
use App\Models\Docente;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListaDocentes extends ListRecords
{
    protected static string $resource = ListaDocentesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ButtonAction::make('pdf')->action(fn ()=> redirect()->route('download.tes', ['model' =>Docente::class, 'view_name'=> 'listadocentes'])),
        ];
    }
}
