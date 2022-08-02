<?php

namespace App\Imports;

use App\Models\Tavar2;
use App\Models\Tavar2dok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport4dok implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Tavar2dok::create([
                'tavardok_id'=>$row[1],
                'name'=>$row[2],
            ]);
            Tavar2::create([
                'tavar_id'=>$row[1],
                'name'=>$row[2],
            ]);
        }
    }
}
