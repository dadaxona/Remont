<?php

namespace App\Imports;

use App\Models\Ichkitavar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport2 implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Ichkitavar::create([
                'tavar_id'=>$row[1],
                'adress'=>$row[2],
                'tavar2_id'=>$row[3],
                'name'=>$row[4],
                'raqam'=>$row[5],
                'hajm'=>$row[6],
                'summa'=>$row[7],
                'summa2'=>$row[8],
                'summa3'=>$row[9],
                'kurs'=>$row[10],
                'kurs2'=>$row[11],
                'kod'=>$row[12]
            ]);
        }
    }
}
