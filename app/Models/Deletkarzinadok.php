<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deletkarzinadok extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'raqam',
        'hajm', 
        'summa',
        'summa2',
        'summa3',
        'kurs', 
        'kurs2'
    ];
    public $timestamps = true;
}
