<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavar2dok extends Model
{
    use HasFactory;
    public $fillable = ['tavardok_id','name'];
    public $timestamps = true;

    public function tavardok()
    {
        return $this->belongsTo(Tavar::class);
    }
}
