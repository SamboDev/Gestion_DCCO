<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoordinadorResource\Pages;
use App\Filament\Resources\CoordinadorResource\RelationManagers;
use App\Models\AreaConocimiento;
use App\Models\Coordinador;
use App\Models\Docente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoordinadorResource extends Resource
{
    protected static ?string $model = Coordinador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_doc')
                    ->required()
                    ->options(Docente::all()->pluck('nombre_doc', 'id')->pluck('apellido_doc', 'id'))
                    ->searchable()
                    ->label('Docente'),
                Forms\Components\Select::make('id_are')
                    ->required()
                    ->options(AreaConocimiento::all()->pluck('nombre_are', 'id'))
                    ->searchable()
                    ->label('Área de Conocimiento'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_doc')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_are')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListCoordinadors::route('/'),
            //'create' => Pages\CreateCoordinador::route('/create'),
            //'edit' => Pages\EditCoordinador::route('/{record}/edit'),
        ];
    }
}
