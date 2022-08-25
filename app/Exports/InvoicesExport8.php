<?php

namespace App\Exports;

use App\Models\Karzina;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport8 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Karzina::select('name', 'summa2', 'soni', 'chegirma', 'itog')->get();  
    }
}
