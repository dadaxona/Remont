<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzinadok extends Model
{
    use HasFactory;
    public $fillable = ['ichkitavardok_id', 'name', 'soni', 'raqam', 'hajm', 'summa', 'summa2', 'chegirma', 'itog', 'status'];
    public $timestamps = true;

}
