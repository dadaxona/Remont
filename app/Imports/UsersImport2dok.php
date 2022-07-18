<?php

namespace App\Imports;

use App\Models\Ichkitavardok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport2dok implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Ichkitavardok::create([
                'name'=>$row[1],
                'raqam'=>$row[2],
                'hajm'=>$row[3],
                'summa'=>$row[4],
                'summa2'=>$row[5],
                'summa3'=>$row[6],
                'kurs'=>$row[7],
                'kurs2'=>$row[8],
                'kod'=>$row[9],
            ]);
        }
    }
}
