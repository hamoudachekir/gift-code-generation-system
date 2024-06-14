<?php

namespace App\Filament\Resources\ValidityResource\Pages;

use App\Filament\Resources\ValidityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;

class ListValidities extends ListRecords
{
    protected static string $resource = ValidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tout'),
            'active' => Tab::make('Les actives')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_active', true)),
            'inactive' => Tab::make('Les non actives')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_active', false)),
        ];
    }

}
