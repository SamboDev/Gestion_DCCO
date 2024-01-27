<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocenteMateriaResource\Pages;
use App\Filament\Resources\DocenteMateriaResource\RelationManagers;
use App\Models\Docente;
use App\Models\DocenteMateria;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocenteMateriaResource extends Resource
{
    protected static ?string $model = DocenteMateria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_doc')
                    ->required()
                    ->options(Docente::all()->mapWithKeys(function ($docente) {
                        return [$docente->id => $docente->nombre_doc . ' ' . $docente->apellido_doc];
                    }))
                    ->searchable()
                    ->label('Docente'),
                Forms\Components\Select::make('id_mat')
                    ->required()
                    ->options(Materia::all()->pluck('nombre_mat', 'id'))
                    ->searchable()
                    ->label('Materia'),
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
                Tables\Columns\TextColumn::make('materias.nombre_mat')
                    ->label('Materia')
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
            'index' => Pages\ListDocenteMaterias::route('/'),
            //'create' => Pages\CreateDocenteMateria::route('/create'),
            //'edit' => Pages\EditDocenteMateria::route('/{record}/edit'),
        ];
    }
}
