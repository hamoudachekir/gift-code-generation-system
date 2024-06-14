<?php

namespace App\Filament\Resources\ValidityResource\Pages;

use App\Filament\Resources\ValidityResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageValidities extends ManageRecords
{
    protected static string $resource = ValidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
