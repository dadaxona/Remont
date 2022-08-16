<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rasxod extends Model
{
    use HasFactory;
    public $fillable = ['rasxod', 'qayer', 'sabap'];
    public $timestamps = true;
}
