<?php

namespace App\Filament\Resources\AreaConocimientoResource\Pages;

use App\Filament\Resources\AreaConocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAreaConocimientos extends ListRecords
{
    protected static string $resource = AreaConocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
