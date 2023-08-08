<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'planification',
        'organization',
        'direction',
        'control',
        'code',
        'project_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    } 
}
