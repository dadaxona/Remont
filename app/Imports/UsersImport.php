<?php

namespace App\Imports;

use App\Models\Usta2;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        return new Usta2([
           'data' => $row[1],
           'name'=> $row[2],
           'tel'=> $row[3],
           'texnika'=> $row[4],
           'muammo'=> $row[5],
           'usta'=> $row[6],
           'xulosa'=> $row[7],
           'vizp'=> $row[8],
           'summa'=> $row[9],
        ]);
    }
}