<?php

namespace App\Filament\Resources\PrivilegioResource\Pages;

use App\Filament\Resources\PrivilegioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrivilegio extends EditRecord
{
    protected static string $resource = PrivilegioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
