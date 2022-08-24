<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavarstatistika extends Model
{
    use HasFactory;
    public $fillable = ['ichkitavar_id','name', 'hajm', 'summa'];
    public $timestamps = true;

    public function ichkitavar()
    {
        return $this->belongsTo(Ichkitavar::class);
    }
}
