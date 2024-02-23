<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaResource\Pages;
use App\Filament\Resources\MateriaResource\RelationManagers;
use App\Models\AreaConocimiento;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-s-calculator';

    protected static ?string $navigationGroup = 'Academico';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_are')
                    ->required()
                    ->options(AreaConocimiento::all()->pluck('nombre_are', 'id'))
                    ->searchable()
                    ->label('Área de Conocimiento'),
                Forms\Components\TextInput::make('codigo_mat')
                    ->required()
                    ->maxLength(10)
                    ->label('Codigo'),
                Forms\Components\TextInput::make('nombre_mat')
                    ->required()
                    ->maxLength(50)
                    ->label('Materia'),
                Forms\Components\Textarea::make('requisito_doc_mat')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Requisito para el Docente'),
                Forms\Components\TextInput::make('horas_trabAuto_mat')
                    ->required()
                    ->numeric()
                    ->label('Horas de Trabajo Autónomo'),
                Forms\Components\TextInput::make('horas_doc_mat')
                    ->required()
                    ->numeric()
                    ->label('Horas de Docente'),
                Forms\Components\TextInput::make('horas_invest_mat')
                    ->required()
                    ->numeric()
                    ->label('Horas de Investigación'),
                Forms\Components\TextInput::make('horas_total')
                    ->required()
                    ->numeric()
                    ->label('Horas Totales'),
                Forms\Components\Textarea::make('descripcion_mat')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('Descripción'),
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
                Tables\Columns\TextColumn::make('codigo_mat')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_mat')
                    ->label('Materia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('horas_trabAuto_mat')
                    ->label('H. Trabajo Autónomo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horas_doc_mat')
                    ->label('H. Docente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horas_invest_mat')
                    ->label('H. Investigación')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horas_total')
                    ->label('H. Totales')
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
            'index' => Pages\ListMaterias::route('/'),
            //'create' => Pages\CreateMateria::route('/create'),
            //'edit' => Pages\EditMateria::route('/{record}/edit'),
        ];
    }
}
