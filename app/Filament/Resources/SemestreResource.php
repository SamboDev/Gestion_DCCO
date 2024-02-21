<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SemestreResource\Pages;
use App\Filament\Resources\SemestreResource\RelationManagers;
use App\Models\Semestre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SemestreResource extends Resource
{
    protected static ?string $model = Semestre::class;

    protected static ?string $navigationIcon = 'heroicon-c-calendar-days';

    protected static ?string $navigationGroup = 'Academico';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_sem')
                    ->required()
                    ->maxLength(25)
                    ->label('Semestre'),
                Forms\Components\DatePicker::make('fecha_ini_sem')
                    ->required()
                    ->label('Inicio'),
                Forms\Components\DatePicker::make('fecha_fin_sem')
                    ->required()
                    ->label('Fin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_sem')
                    ->label('Semestre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_ini_sem')
                    ->label('Fecha Inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin_sem')
                    ->label('Fecha Fin')
                    ->date()
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
            'index' => Pages\ListSemestres::route('/'),
            //'create' => Pages\CreateSemestre::route('/create'),
            //'edit' => Pages\EditSemestre::route('/{record}/edit'),
        ];
    }
}
