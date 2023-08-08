<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
        'installation_id'
    ];

    public function installacion(){
        return $this->belongsTo(Installacion::class);
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public function administrativeProcess(){
        return $this->hasOne(AdministrativeProcess::class);
    }
}
