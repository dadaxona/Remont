<?php

namespace App\Exports;

use App\Models\Userdok;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport5dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Userdok::all();  
    }
}
