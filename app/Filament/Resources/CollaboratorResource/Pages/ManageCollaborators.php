<?php

namespace App\Filament\Resources\CollaboratorResource\Pages;

use App\Filament\Resources\CollaboratorResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageCollaborators extends ManageRecords
{
    protected static string $resource = CollaboratorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->stickyModalHeader()
            ->stickyModalFooter()
            ->modalWidth(MaxWidth::FourExtraLarge)
            ->slideOver()
            ->closeModalByClickingAway(false),
        ];
    }
}
