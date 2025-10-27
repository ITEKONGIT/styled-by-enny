<?php

namespace App\Filament\Resources\SalonSettingsResource\Pages;

use App\Filament\Resources\SalonSettingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalonSettings extends ListRecords
{
    protected static string $resource = SalonSettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
