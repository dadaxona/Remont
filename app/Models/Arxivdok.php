<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arxivdok extends Model
{
    use HasFactory;
    public $fillable = [
        'userdok_id',
        'itogs',
        'naqt',
        'plastik',
        'bank',
        'karzs',
    ];
    public $timestamps = true;

    public function userdok()
    {
        return $this->belongsTo(Userdok::class);
    }
}
