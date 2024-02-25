<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaPorAreasDeConocimientoResource\Pages;
use App\Filament\Resources\MateriaPorAreasDeConocimientoResource\RelationManagers;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriaPorAreasDeConocimientoResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Materia por AC';

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
                Tables\Columns\TextColumn::make('area_conocimiento.nombre_are')
                    ->label('Área de Conocimiento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_mat')
                    ->label('Materia')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMateriaPorAreasDeConocimientos::route('/'),

        ];
    }
}
