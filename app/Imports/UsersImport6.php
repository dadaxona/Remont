<?php

namespace App\Imports;

use App\Models\Adress;
use App\Models\Adressdok;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport6 implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Adress::create([
                'adress'=>$row[1],
            ]);
            Adressdok::create([
                'adress'=>$row[1],
            ]);
        }
    }
}
