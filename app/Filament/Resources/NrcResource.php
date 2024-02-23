<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NrcResource\Pages;
use App\Filament\Resources\NrcResource\RelationManagers;
use App\Filament\Resources\NrcResource\Widgets\NrcCarrera;
use App\Models\Carrera;
use App\Models\Docente;
use App\Models\DocenteMateria;
use App\Models\Materia;
use App\Models\Nrc;
use App\Models\Semestre;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NrcResource extends Resource
{

    protected static ?string $model = Nrc::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationGroup = 'Academico';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_car')
                    ->required()
                    ->options(Carrera::all()->pluck('nombre_car', 'id'))
                    ->searchable()
                    ->label('Carrera'),
                Forms\Components\Select::make('id_mat')
                    ->required()
                    ->options(Materia::all()->pluck('nombre_mat', 'id'))
                    ->searchable()
                    ->label('Materia'),
                Forms\Components\Select::make('id_dm')
                    ->required()
                    ->options(function (callable $get) {
                        $materiaId = $get('id_mat');
                    
                        return DocenteMateria::where('id_mat', $materiaId)
                            ->with('docente')
                            ->get()
                            ->mapWithKeys(function ($docenteMateria) {
                                return [
                                    $docenteMateria->id => $docenteMateria->docente->nombre_doc . ' ' . $docenteMateria->docente->apellido_doc,
                                ];
                            });
                    })
                    ->searchable()
                    ->label('Docente - Materia'),
                Forms\Components\Select::make('id_sem')
                    ->required()
                    ->options(Semestre::all()->pluck('nombre_sem', 'id'))
                    ->searchable()
                    ->label('Semestre'),
                Forms\Components\TextInput::make('codigo_nrc')
                    ->required()
                    ->maxLength(10)
                    ->label('NRC'),
                Forms\Components\Section::make('Información de Ayuda')
                    ->description('Prevent abuse by limiting the number of requests per period')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('materia.nombre_mat')
                    ->label('Materia')
                    ->numeric()
                    ->sortable()
                    ->label('Materia'),
                Tables\Columns\TextColumn::make('semestre.nombre_sem')
                    ->label('Semestre')
                    ->numeric()
                    ->sortable()
                    ->label('Semestre'),
                Tables\Columns\TextColumn::make('carrera.nombre_car')
                    ->label('Carrera')
                    ->numeric()
                    ->sortable()
                    ->label('Carrera'),
                Tables\Columns\TextColumn::make('docente_materia.docente.nombre_doc')
                    ->label('Doc. Nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Docente'),
                Tables\Columns\TextColumn::make('docente_materia.docente.apellido_doc')
                    ->label('Doc. Apellido')
                    ->numeric()
                    ->sortable()
                    ->label('Docente'),
                Tables\Columns\TextColumn::make('codigo_nrc')
                    ->label('NRC')
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

    public static function getWidgets(): array
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