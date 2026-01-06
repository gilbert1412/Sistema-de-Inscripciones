<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    protected $table = 'inscripciones';

    protected $guarded = ['created_at', 'updated_at'];
}
