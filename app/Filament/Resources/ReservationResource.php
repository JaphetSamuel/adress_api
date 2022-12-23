<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('heure'),
                Forms\Components\Select::make('tarification_id')
                    ->relationship('tarification', 'id')
                    ->required(),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'id')
                    ->required(),
                Forms\Components\TextInput::make('owner_id')
                    ->required(),
                Forms\Components\Select::make('appartement_id')
                    ->relationship('appartement', 'id')
                    ->required(),
                Forms\Components\DateTimePicker::make('date_debut'),
                Forms\Components\DateTimePicker::make('date_fin'),
                Forms\Components\TextInput::make('note')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('heure'),
                Tables\Columns\TextColumn::make('tarification.id'),
                Tables\Columns\TextColumn::make('customer.id'),
                Tables\Columns\TextColumn::make('owner_id'),
                Tables\Columns\TextColumn::make('appartement.id'),
                Tables\Columns\TextColumn::make('date_debut')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('date_fin')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('note'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'view' => Pages\ViewReservation::route('/{record}'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }    
}
