<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina3dok extends Model
{
    use HasFactory;
    public $fillable = [
        'ichkitavardok_id', 
        'name', 
        'soni', 
        'raqam', 
        'hajm', 
        'summa', 
        'summa2', 
        'chegirma', 
        'itog',
        'status'
    ];
    public $timestamps = true;

    public function ichkitavardok()
    {
        return $this->belongsTo(Ichkitavardok::class);
    }
}
