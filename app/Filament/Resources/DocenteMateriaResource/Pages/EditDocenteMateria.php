<?php

namespace App\Filament\Resources\DocenteMateriaResource\Pages;

use App\Filament\Resources\DocenteMateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocenteMateria extends EditRecord
{
    protected static string $resource = DocenteMateriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
