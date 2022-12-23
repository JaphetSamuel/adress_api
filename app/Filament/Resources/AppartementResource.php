<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppartementResource\Pages;
use App\Filament\Resources\AppartementResource\RelationManagers;
use App\Models\Appartement;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppartementResource extends Resource
{
    protected static ?string $model = Appartement::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titre')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\Toggle::make('disponible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ref')->label('reference'),
                Tables\Columns\TextColumn::make('titre')->searchable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('type')->searchable(),
                Tables\Columns\IconColumn::make('disponible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->label("date d'ajout")
                    ->dateTime(),
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
            'index' => Pages\ListAppartements::route('/'),
            'create' => Pages\CreateAppartement::route('/create'),
            'view' => Pages\ViewAppartement::route('/{record}'),
            'edit' => Pages\EditAppartement::route('/{record}/edit'),
        ];
    }
}
