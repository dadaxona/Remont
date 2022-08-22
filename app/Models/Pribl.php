<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pribl extends Model
{
    use HasFactory;
    public $fillable = [
        'jami',
        'karz',
        'pribl',
        'vse',
        'rasxod'
    ];
    public $timestamps = true;
}
