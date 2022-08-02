<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tayyorsqladdok extends Model
{
    use HasFactory;
    public $fillable = ['tavardok_id', 'adress', 'tavar2dok_id', 'name', 'raqam', 'hajm', 'summa', 'summa2', 'summa3', 'kurs', 'kurs2'];
    public $timestamps = true;

    public function tavardok()
    {
        return $this->belongsTo(Tavardok::class);
    }

    public function tavar2dok()
    {
        return $this->belongsTo(Tavar2dok::class);
    }
}
