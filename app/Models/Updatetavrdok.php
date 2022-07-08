<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updatetavrdok extends Model
{
    use HasFactory;
    public $fillable = ['ichkitavardok_id', 'name', 'raqam', 'hajm', 'summa', 'summa2', 'summa3', 'kod'];
    public $timestamps = true;
}
