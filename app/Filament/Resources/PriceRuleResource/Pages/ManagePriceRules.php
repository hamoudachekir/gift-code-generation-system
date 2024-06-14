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
                ->mutateFormDataUsing(function (array $data): array {
                    $data['created_by'] = auth()->id();
            
                    return $data;
                })
                ->stickyModalHeader()
                ->stickyModalFooter()
                ->modalWidth(MaxWidth::Medium)
                ->slideOver(),
        ];
    }
}
