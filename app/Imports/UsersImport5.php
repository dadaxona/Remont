<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport5 implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            User::create([
                'name'=>$row[1],
                'tel'=>$row[2], 
                'firma'=>$row[3], 
                'inn'=>$row[4],
            ]);
        }
    }
}
