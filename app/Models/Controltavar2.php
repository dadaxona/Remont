<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controltavar2 extends Model
{
    use HasFactory;
    public $fillable = ['name', 'hajm', 'summa'];
    public $timestamps = true;
}
