<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NrcResource\Pages;
use App\Filament\Resources\NrcResource\RelationManagers;
use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\Nrc;
use App\Models\Semestre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NrcResource extends Resource
{
    protected static ?string $model = Nrc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_mat')
                    ->required()
                    ->options(Materia::all()->pluck('nombre_doc', 'id'))
                    ->searchable()
                    ->label('Materia'),
                Forms\Components\Select::make('id_sem')
                    ->required()
                    ->options(Semestre::all()->pluck('nombre_sem', 'id'))
                    ->searchable()
                    ->label('Semestre'),
                Forms\Components\Select::make('id_car')
                    ->required()
                    ->options(Carrera::all()->pluck('nombre_car', 'id'))
                    ->searchable()
                    ->label('Carrera'),
                Forms\Components\TextInput::make('id_dm')
                    ->required()
                    ->options(Docente::all()->pluck('id_dm', 'id'))
                    ->searchable()
                    ->label('Docente'),
                Forms\Components\TextInput::make('codigo_nrc')
                    ->required()
                    ->maxLength(10)
                    ->label('NRC'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_mat')
                    ->numeric()
                    ->sortable()
                    ->label('Materia'),
                Tables\Columns\TextColumn::make('id_sem')
                    ->numeric()
                    ->sortable()
                    ->label('Semestre'),
                Tables\Columns\TextColumn::make('id_car')
                    ->numeric()
                    ->sortable()
                    ->label('Carrera'),
                Tables\Columns\TextColumn::make('id_dm')
                    ->numeric()
                    ->sortable()
                    ->label('Docente'),
                Tables\Columns\TextColumn::make('codigo_nrc')
                    ->searchable()
                    ->label('NRC'),
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
            'index' => Pages\ListNrcs::route('/'),
            //'create' => Pages\CreateNrc::route('/create'),
            //'edit' => Pages\EditNrc::route('/{record}/edit'),
        ];
    }
}
