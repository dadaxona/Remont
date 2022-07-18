<?php

namespace App\Exports;

use App\Models\Ichkitavardok;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport2dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ichkitavardok::all();  
    }
}
