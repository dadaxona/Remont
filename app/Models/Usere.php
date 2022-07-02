<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usere extends Model
{
    use HasFactory;
    public $fillable = ['data','name','tel', 'texnika', 'muammo','usta','xulosa','vizp','summa'];
    public $timestamps = true;
}
