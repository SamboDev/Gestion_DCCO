<?php

namespace App\Filament\Resources\NrcResource\Pages;

use App\Filament\Resources\NrcResource;
use App\Filament\Resources\NrcResource\Widgets\NrcCarrera;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\Widget;

class ListNrcs extends ListRecords
{
    protected static string $resource = NrcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            
        ];
    }
}
