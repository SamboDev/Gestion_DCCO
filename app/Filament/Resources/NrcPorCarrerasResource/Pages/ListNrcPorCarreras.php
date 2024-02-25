<?php

namespace App\Filament\Resources\NrcPorCarrerasResource\Pages;

use App\Filament\Resources\NrcPorCarrerasResource;
use App\Models\Nrc;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNrcPorCarreras extends ListRecords
{
    protected static string $resource = NrcPorCarrerasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ButtonAction::make('pdf')->action(fn ()=> redirect()->route('download.tes', ['model' =>Nrc::class, 'view_name'=> 'nrcCarreras'])),
        ];
    }
}
