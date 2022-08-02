<?php

namespace App\Exports;

use App\Models\Adress;
use App\Models\Adressdok;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport6dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Adressdok::all();  
    }
}
