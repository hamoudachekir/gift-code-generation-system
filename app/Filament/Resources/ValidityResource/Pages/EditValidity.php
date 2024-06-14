<?php

namespace App\Filament\Resources\ValidityResource\Pages;

use App\Filament\Resources\ValidityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditValidity extends EditRecord
{
    protected static string $resource = ValidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }




    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth()->id();
        $record->update($data);

        return $record;
    }
}
