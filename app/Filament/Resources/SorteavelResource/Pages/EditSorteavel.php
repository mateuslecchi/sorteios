<?php

namespace App\Filament\Resources\SorteavelResource\Pages;

use App\Filament\Resources\SorteavelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSorteavel extends EditRecord
{
    protected static string $resource = SorteavelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
