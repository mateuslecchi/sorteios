<?php

namespace App\Filament\Resources\SorteavelResource\Pages;

use App\Filament\Resources\SorteavelResource;
use App\Imports\SorteaveisImport;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListSorteavels extends ListRecords
{
    protected static string $resource = SorteavelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\Action::make('importarCSV')
            //     ->label('Importar CSV')
            //     ->action(function (array $data) {
            //         Excel::import(new SorteaveisImport(), $data['arquivo_csv']);
            //         Notification::make()
            //             ->title('Dados importados com sucesso!')
            //             ->success()
            //             ->send();
            //     })
            //     ->form([
            //         // Forms\Components\FileUpload::make('arquivo_csv')
            //         //     ->label('Arquivo CSV')
            //         //     ->required()
            //         //     ->acceptedFileTypes(['text/csv', 'text/plain'])
            //     ])
        ];
    }
}
