<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Solicitud;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SolicitudResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SolicitudResource\RelationManagers;
use App\Filament\Resources\SolicitudResource\Widgets\SolicitudStatsOverview;

class SolicitudResource extends Resource
{
    protected static ?string $model = Solicitud::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('solicitud')
                    ->required()
                    ->placeholder('Describe tu solicitud')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('sc')
                    ->acceptedFileTypes(['application/pdf'])
                    ->preserveFilenames()
                    ->required()
                    ->placeholder('Adjunta tu solicitud o arrastra tu archivo PDF aquí')
                    ->previewable(false)
                    ->downloadable(),
                    //->maxLength(255),
                Forms\Components\FileUpload::make('ft')
                ->acceptedFileTypes(['application/pdf'])
                    ->preserveFilenames()
                    ->required()
                    ->placeholder('Adjunta ficha técnica o arrastra tu archivo PDF aquí')
                    ->previewable(false)
                    ->downloadable(),
                    //->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->previewable(false)
                    ->downloadable(),
                Forms\Components\Select::make('units_id')
                    ->relationship('units', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('solicitud')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sc')
                    ->searchable()
                    ->limit(10),
                Tables\Columns\TextColumn::make('ft')
                    ->searchable()
                    ->limit(10),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('units.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y h:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-m-Y h:i')
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
        return[
            SolicitudStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSolicituds::route('/'),
            'create' => Pages\CreateSolicitud::route('/create'),
            'edit' => Pages\EditSolicitud::route('/{record}/edit'),
        ];
    }

   
}
