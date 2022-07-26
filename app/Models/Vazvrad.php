<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vazvrad extends Model
{
    use HasFactory;
    public $fillable = ['username', 'name', 'sabab', 'hajm', 'summa', 'kod'];
    public $timestamps = true;
}
