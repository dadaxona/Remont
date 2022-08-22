<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pribldok extends Model
{
    use HasFactory;
    public $fillable = [
        'jami',
        'karz',
        'pribl',
        'vse',
    ];
    public $timestamps = true;
}
