<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'company',
        'identification',
        'address',
        'phone',
        'email',
        'country',
        'city',
        'state',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function installations(){
        return $this->hasMany(Installacion::class);
    }
}
