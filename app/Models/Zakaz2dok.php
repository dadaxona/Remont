<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakaz2dok extends Model
{
    use HasFactory;
    public $fillable = [
        'zakazdok_id',
        'ichkitavardok_id',
        'name', 
        'soni', 
        'raqam', 
        'hajm', 
        'summa', 
        'summa2', 
        'chegirma', 
        'itog',
    ];
    public $timestamps = true;

    public function zakazdok()
    {
        return $this->belongsTo(Zakazdok::class);
    }

    public function ichkitavardok()
    {
        return $this->belongsTo(Ichkitavardok::class);
    }
}
