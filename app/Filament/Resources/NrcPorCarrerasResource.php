<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NrcPorCarrerasResource\Pages;
use App\Filament\Resources\NrcPorCarrerasResource\RelationManagers;
use App\Models\Nrc;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NrcPorCarrerasResource extends Resource
{
    protected static ?string $model = Nrc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Reportes';

    protected static ?string $navigationLabel = 'Nrc por Carreras';

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
                Tables\Columns\TextColumn::make('carrera.nombre_car')
                ->label('Carrera')
                ->searchable(),
                Tables\Columns\TextColumn::make('codigo_nrc')
                    ->label('NRC')
                    ->searchable()
                    ->label('NRC'),
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
            'index' => Pages\ListNrcPorCarreras::route('/'),
        ];
    }
}
