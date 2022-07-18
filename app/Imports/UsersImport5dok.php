<?php

namespace App\Imports;

use App\Models\Userdok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport5dok implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $data = Userdok::create([
                'name'=>$row[1],
                'tel'=>$row[2], 
                'firma'=>$row[3], 
                'inn'=>$row[4],
            ]);
            // Javob::create([
            //     'user_id' => $data->id,
            //     'javob' => 0
            // ]);
        }
    }
}
