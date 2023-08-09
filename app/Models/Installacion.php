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
        'area_id',
        'client_id',
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
