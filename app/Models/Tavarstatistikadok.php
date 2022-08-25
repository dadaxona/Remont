<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavarstatistikadok extends Model
{
    use HasFactory;
    public $fillable = ['ichkitavardok_id','name', 'hajm', 'summa'];
    public $timestamps = true;

    public function ichkitavardok()
    {
        return $this->belongsTo(Ichkitavardok::class);
    }
}
