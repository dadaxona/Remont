<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drektor extends Model
{
    use HasFactory;
    protected $table = 'drektors';
    public $fillable = ['name','login','password','count'];
    public $timestamps = false;
}