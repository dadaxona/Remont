<?php

namespace App\Imports;

use App\Models\Rasxoddok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport7dok implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Rasxoddok::create([
                'rasxod'=>$row[1], 
                'qayer'=>$row[2], 
                'sabap'=>$row[3],
            ]);
        }
    }
}
