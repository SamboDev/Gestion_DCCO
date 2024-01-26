<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocenteResource\Pages;
use App\Filament\Resources\DocenteResource\RelationManagers;
use App\Models\Docente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocenteResource extends Resource
{
    protected static ?string $model = Docente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_doc')
                    ->required()
                    ->maxLength(50)
                    ->label('Nombres'),
                Forms\Components\TextInput::make('apellido_doc')
                    ->required()
                    ->maxLength(50)
                    ->label('Apellidos'),
                Forms\Components\TextInput::make('cedula_doc')
                    ->required()
                    ->maxLength(10)
                    ->label('Cédula'),
                Forms\Components\DatePicker::make('fecha_nac_doc')
                    ->required()
                    ->label('Fecha de Nacimiento'),
                Forms\Components\TextInput::make('direccion_doc')
                    ->required()
                    ->maxLength(150)
                    ->label('Dirección'),
                Forms\Components\TextInput::make('correo_doc')
                    ->required()
                    ->maxLength(50)
                    ->label('Correo'),
                Forms\Components\TextInput::make('telefono_doc')
                    ->tel()
                    ->required()
                    ->maxLength(10)
                    ->label('Teléfono'),
                Forms\Components\FileUpload::make('curriculum_url')
                    ->disk('local')
                    ->directory('form-attachments')
                    ->visibility('private')
                    ->label('Curriculum'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cedula_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_nac_doc')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('direccion_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('curriculum_url')
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
            'index' => Pages\ListDocentes::route('/'),
            //'create' => Pages\CreateDocente::route('/create'),
            //'edit' => Pages\EditDocente::route('/{record}/edit'),
        ];
    }
}
