<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Javobdok extends Model
{
    use HasFactory;
    public $fillable = [
        'userdok_id',
        'javob',
    ];
    public $timestamps = true;
}
