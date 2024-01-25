<?php

namespace App\Filament\Resources\PrivilegioResource\Pages;

use App\Filament\Resources\PrivilegioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrivilegios extends ListRecords
{
    protected static string $resource = PrivilegioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
