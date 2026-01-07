<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';

    protected $guarded = ['created_at', 'updated_at'];

       public function inscripciones()
    {
        return $this->hasMany(Inscripciones::class, 'alumnos_id');
    }
}
