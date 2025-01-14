<?php

namespace App\Filament\Resources\ValidityResource\Pages;

use App\Filament\Resources\ValidityResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageValidities extends ManageRecords
{
    protected static string $resource = ValidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->stickyModalHeader()
            ->stickyModalFooter()
            ->modalWidth(MaxWidth::Medium)
            ->slideOver()
            ->closeModalByClickingAway(false),
        ];
    }
}
