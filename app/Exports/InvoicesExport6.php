<?php

namespace App\Exports;

use App\Models\Adress;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport6 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Adress::all();  
    }
}
