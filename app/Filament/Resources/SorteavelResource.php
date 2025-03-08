<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SorteavelResource\Pages;
use App\Filament\Resources\SorteavelResource\RelationManagers;
use App\Imports\SorteaveisImport;
use App\Models\Sorteavel;
use Filament\Actions\CreateAction;
use Filament\Actions\Modal\Actions\Action;
use Filament\Actions\StaticAction;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SorteavelResource extends Resource
{
    protected static ?string $model = Sorteavel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')->required(),
                Forms\Components\TextInput::make('matricula')->required()->unique()->numeric(),
                Forms\Components\Toggle::make('sorteado')->disabled(), // Somente para visualização
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
                Tables\Columns\TextColumn::make('matricula'),
                Tables\Columns\IconColumn::make('sorteado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Sorteado em'),
                Tables\Columns\TextColumn::make('secretaria'),
                Tables\Columns\TextColumn::make('local'),
            ])->defaultSort('updated_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('sortear')
                ->label('Sortear')
                ->action(function () {
                    $sorteavel = Sorteavel::where('sorteado', false)->inRandomOrder()->first();
                    if ($sorteavel) {
                        $sorteavel->sorteado = true;
                        $sorteavel->save();
                        Notification::make()
                            ->title('Sorteado: ' . $sorteavel->nome)
                            ->success()
                            ->persistent()
                            ->send();
                    } else {
                        Notification::make()
                        ->title('Todos já foram sorteados!')
                        ->danger()
                        ->send();
                    }
                }),
                // Tables\Actions\Action::make('importarCSV')
                // ->label('Importar CSV')
                // ->action(function (array $data) {
                //     // Salva o arquivo em um diretório temporário
                //     $filePath = $data['arquivo_csv'];

                //     // Importa o arquivo usando o caminho completo
                //     Excel::import(new SorteaveisImport(), Storage::disk('public')->path($filePath));

                //     // Notifica sucesso e apaga o arquivo temporário
                //     Notification::make()
                //         ->title('Dados importados com sucesso!')
                //         ->success()
                //         ->send();

                //     // Apaga o arquivo temporário para evitar armazenamento desnecessário
                //     Storage::delete($filePath);
                // })
                // ->form([
                //     Forms\Components\FileUpload::make('arquivo_csv')
                //         ->label('Arquivo CSV')
                //         ->required()
                //         ->acceptedFileTypes(['text/csv', 'text/plain'])
                // ]),
                // Tables\Actions\Action::make('limparTabela')
                // ->label('Limpar Tabela')
                // ->action(function () {
                //     // Aqui você pode adicionar lógica para limpar a tabela
                //     Sorteavel::query()->delete(); // Remove todos os registros

                //     Notification::make()
                //         ->title('Tabela limpa com sucesso!')
                //         ->success()
                //         ->send();
                // })
                // ->form([
                //     Fieldset::make('Deseja Continuar?')
                // ]),

            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSorteavels::route('/'),
            'create' => Pages\CreateSorteavel::route('/create'),
            'edit' => Pages\EditSorteavel::route('/{record}/edit'),
        ];
    }
}
