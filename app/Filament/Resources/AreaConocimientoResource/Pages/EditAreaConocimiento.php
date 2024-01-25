<?php

namespace App\Filament\Resources\AreaConocimientoResource\Pages;

use App\Filament\Resources\AreaConocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAreaConocimiento extends EditRecord
{
    protected static string $resource = AreaConocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
