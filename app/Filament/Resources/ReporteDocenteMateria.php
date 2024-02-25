<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReporteDocenteMateriaResource\Pages;
use App\Filament\Resources\ReporteDocenteMateriaResource\RelationManagers;
use App\Models\DocenteMateria;
use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReporteDocenteMateria extends Resource
{
    //protected static ?string $model = ReporteDocenteMateria::class;
    protected static ?string $model = DocenteMateria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Docentes por Materias';

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
                Tables\Columns\TextColumn::make('materia.nombre_mat')
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

            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\Action::make('downloand')
                // ->url(fn (DocenteMateria $records)=> route('download.pdf',$records))
                // ->openUrlInNewTab(),
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
            'index' => Pages\ListReporteDocenteMaterias::route('/'),
            //'create' => Pages\CreateReporteDocenteMateria::route('/create'),
            //'edit' => Pages\EditReporteDocenteMateria::route('/{record}/edit'),
        ];
    }
}
