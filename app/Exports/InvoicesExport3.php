<?php

namespace App\Exports;

use App\Models\Tavar;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport3 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tavar::all();  
    }
}
