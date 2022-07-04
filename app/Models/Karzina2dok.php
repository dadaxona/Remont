<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina2dok extends Model
{
    use HasFactory;
    public $fillable = [
        'userdok_id',
        'ichkitavardok_id', 
        'clentra',
        'name', 
        'soni', 
        'raqam', 
        'hajm', 
        'summa', 
        'summa2', 
        'chegirma', 
        'itog',
        'zakaz'
    ];
    public $timestamps = true;

    public function userdok()
    {
        return $this->belongsTo(Userdok::class);
    }

    public function ichkitavardok()
    {
        return $this->belongsTo(Ichkitavardok::class);
    }
}
