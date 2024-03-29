<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarreraResource\Pages;
use App\Filament\Resources\CarreraResource\RelationManagers;
use App\Models\Carrera;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\View\LegacyComponents\Widget;
use Filament\Widgets\BarChartWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarreraResource extends Resource
{
    protected static ?string $model = Carrera::class;

    protected static ?string $navigationIcon = 'heroicon-s-wallet';

    protected static ?string $navigationGroup = 'Academico';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_car')
                    ->required()
                    ->maxLength(50)
                    ->label('Carrera'),
                Forms\Components\TextInput::make('titulo_car')
                    ->required()
                    ->maxLength(50)
                    ->label('Titulo a Obtener'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_car')
                    ->label('Carrera')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulo_car')
                    ->label('Titulo a obtener')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCarreras::route('/'),
            //'create' => Pages\CreateCarrera::route('/create'),
            //'edit' => Pages\EditCarrera::route('/{record}/edit'),
        ];
    }
}
