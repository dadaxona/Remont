<?php

namespace App\Exports;

use App\Models\Tavar2;
use App\Models\Tavar2dok;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport4dok implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tavar2dok::all();  
    }
}
