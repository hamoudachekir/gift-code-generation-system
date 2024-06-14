<?php

namespace App\Filament\Resources\ValidityResource\Pages;

use App\Filament\Resources\ValidityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateValidity extends CreateRecord
{
    protected static string $resource = ValidityResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['updated_by'] = auth()->id();
    
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
