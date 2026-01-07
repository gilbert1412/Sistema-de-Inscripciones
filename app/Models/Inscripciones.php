<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    protected $table = 'inscripciones';

    protected $guarded = ['created_at', 'updated_at'];

     public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'alumnos_id');
    }

    public function taller()
    {
        return $this->belongsTo(Talleres::class, 'talleres_id');
    }
}
