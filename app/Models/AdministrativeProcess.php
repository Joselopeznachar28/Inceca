<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'project_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    } 
    public function planification(){
        return $this->hasOne(Planification::class);
    }
    public function organization(){
        return $this->hasOne(Organization::class);
    }
    public function direction(){
        return $this->hasOne(Direction::class);
    }
    public function control(){
        return $this->hasOne(Control::class);
    }
}
