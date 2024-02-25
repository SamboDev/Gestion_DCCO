<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoordinadoresAreaResource\Pages;
use App\Filament\Resources\CoordinadoresAreaResource\RelationManagers;
use App\Models\Area;
use App\Models\Coordinador;
use App\Models\Docente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoordinadoresAreaResource extends Resource
{
    protected static ?string $model =Coordinador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Cordinador AC';

    protected static ?string $navigationGroup = 'Reportes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('docente.nombre_doc')
                    ->label('Doc. Nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente.apellido_doc')
                    ->label('Doc. Apellido')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area_conocimiento.nombre_are')
                    ->label('Area Conocimiento')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoordinadoresAreas::route('/'),
        ];
    }
}
