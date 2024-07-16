<?php

namespace App\Filament\Resources\PriceRuleResource\Pages;

use App\Filament\Resources\PriceRuleResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManagePriceRules extends ManageRecords
{
    protected static string $resource = PriceRuleResource::class;

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
