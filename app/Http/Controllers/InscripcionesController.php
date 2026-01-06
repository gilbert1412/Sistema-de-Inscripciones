<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Talleres;

class InscripcionesController extends Controller
{
    public function index()
    {
        $talleres =Talleres::where('estado', 'activo')->get();
        return view('inscripciones', );
    }
}
