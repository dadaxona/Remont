<?php

namespace App\Exports;

use App\Models\Rasxod;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport7dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rasxod::all();  
    }
}
