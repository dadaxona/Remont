<?php

namespace App\Imports;

use App\Models\Rasxod;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport7 implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Rasxod::create([
                'rasxod'=>$row[1], 
                'qayer'=>$row[2], 
                'sabap'=>$row[3],
            ]);
        }
    }
}
