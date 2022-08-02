<?php

namespace App\Exports;

use App\Models\Tavar;
use App\Models\Tavardok;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport3dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tavardok::all();  
    }
}
