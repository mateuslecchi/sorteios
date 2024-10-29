<?php

namespace App\Imports;

use App\Models\Sorteavel;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SorteaveisImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        Log::info('IMportação INICIO');
        return new Sorteavel([
            'nome' => $row['nome'],
            'matricula' => $row['matricula'],
            'secretaria' => $row['secretaria'],
            'local' => $row['local'],
            'sorteado' => false
        ]);
        Log::info('IMportação FINAL');
    }
}