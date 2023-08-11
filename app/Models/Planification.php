<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'finish',
        'date_init',
        'date_finish',
        'administrative_process_id',
    ];

    public function administrativeProcess(){
        return $this->belongsTo(AdministrativeProcess::class);
    }
}
