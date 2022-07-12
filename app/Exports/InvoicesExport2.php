<?php

namespace App\Exports;

use App\Models\Ichkitavar;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ichkitavar::all();  
    }
}
