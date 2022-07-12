<?php

namespace App\Exports;

use App\Models\Tavar2;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport4 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tavar2::all();  
    }
}
