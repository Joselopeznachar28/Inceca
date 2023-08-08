<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'code',
        'project_id',
    ];

    public function project(){
        return  $this->belongsTo(Project::class);
    }

}
