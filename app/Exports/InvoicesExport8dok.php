<?php

namespace App\Exports;

use App\Models\Karzinadok;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport8dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Karzinadok::select('name', 'summa2', 'soni', 'chegirma', 'itog')->get();  
    }
}
