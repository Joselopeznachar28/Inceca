<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'city',
        'address',
        'code',
    ];

    public function installation(){
        return $this->hasOne(Installacion::class);
    }
}
