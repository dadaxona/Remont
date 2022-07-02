<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usta2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'name',
        'tel',
        'texnika',
        'muammo',
        'usta',
        'xulosa',
        'vizp',
        'summa',
    ];
    public $timestamps = true;
}
