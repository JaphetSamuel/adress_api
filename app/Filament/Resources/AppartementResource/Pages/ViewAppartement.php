<?php

namespace App\Filament\Resources\AppartementResource\Pages;

use App\Filament\Resources\AppartementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAppartement extends ViewRecord
{
    protected static string $resource = AppartementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
