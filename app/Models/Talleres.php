<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    protected $table = 'talleres';

    protected $guarded = ['created_at', 'updated_at']; // Evita la asignación masiva de estos campos 
}
