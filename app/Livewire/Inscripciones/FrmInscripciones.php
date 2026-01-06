<?php

namespace App\Livewire\Inscripciones;

use App\Models\Talleres;
use Livewire\Component;

class FrmInscripciones extends Component
{
    public function render()
    {
        $talleres =Talleres::where('estado', 'activo')->get();
        return view('livewire.inscripciones.frm-inscripciones',compact('talleres'));
    }
}
