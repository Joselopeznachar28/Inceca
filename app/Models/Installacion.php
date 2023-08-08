<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
        'area_id'
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function project(){
        return $this->hasMany(Project::class);
    }
}
