<?php

namespace App\Imports;

use App\Models\Tavar2;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport4 implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Tavar2::create([
                'tavar_id'=>$row[1],
                'name'=>$row[2],
            ]);
        }
    }
}
