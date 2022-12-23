<?php

namespace App\Filament\Resources\AppartementResource\Pages;

use App\Filament\Resources\AppartementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppartement extends EditRecord
{
    protected static string $resource = AppartementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
