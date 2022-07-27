<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistikadok extends Model
{
    use HasFactory;
    public $fillable = ['foyda', 'kassa','pribl', 'limit'];
    public $timestamps = true;
}
