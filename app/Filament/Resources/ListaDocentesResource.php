<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListaDocentesResource\Pages;
use App\Filament\Resources\ListaDocentesResource\RelationManagers;
use App\Models\Docente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListaDocentesResource extends Resource
{
    protected static ?string $model =Docente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Lista Ingenieros';

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
            Tables\Columns\TextColumn::make('nombre_doc')
                ->label('Nombre')
                ->searchable(),
            Tables\Columns\TextColumn::make('apellido_doc')
                ->label('Apellido')
                ->searchable(),
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
            'index' => Pages\ListListaDocentes::route('/'),
        ];
    }
}
