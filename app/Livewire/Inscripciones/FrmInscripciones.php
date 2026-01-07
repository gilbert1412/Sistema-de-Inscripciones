<?php

namespace App\Livewire\Inscripciones;

use App\Models\Alumnos;
use App\Models\Inscripciones;
use App\Models\Talleres;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class FrmInscripciones extends Component
{
     #[Validate('required')] 
    public $dni='';
     #[Validate('required')] 
    public $edad=null;
     #[Validate('required')] 
    public $apellido_paterno='';
     #[Validate('required')] 
    public $apellido_materno='';
     #[Validate('required')] 
    public $nombre='';
     #[Validate('required')] 
    public $apoderado='';
     #[Validate('required')] 
    public $celular_apoderado='';
     #[Validate('required')] 
    public $direccion_apoderado='';
     #[Validate('required')] 
    public $taller='';
    public $id;
    public $inscripcionId;
//public $talleres = [];



    public function mount($id = null)
    {
        $this->inscripcionId = $id;

        if ($id) {
            $this->cargarInscripcion($id);
        }
    }

    private function cargarInscripcion($id)
    {
        $inscripcion = Inscripciones::with('alumno')->findOrFail($id);

        $this->dni = $inscripcion->alumno->dni;
        $this->edad = $inscripcion->alumno->edad;
        $this->apellido_paterno = $inscripcion->alumno->apePaterno;
        $this->apellido_materno = $inscripcion->alumno->apeMaterno;
        $this->nombre = $inscripcion->alumno->nombre;
        $this->apoderado = $inscripcion->alumno->apoderado;
        $this->celular_apoderado = $inscripcion->alumno->telefono;
        $this->direccion_apoderado = $inscripcion->alumno->direccion;
        $this->taller = $inscripcion->talleres_id;
        
    }
    
    
    public function guardarInscripcion()
    {
         $this->validate();

    DB::transaction(function () {

        $taller = Talleres::lockForUpdate()->findOrFail($this->taller);

        $inscritos = Inscripciones::where('talleres_id', $taller->id)->count();
        if ($inscritos >= $taller->cupo) {
            throw new \Exception('El taller ya no tiene cupos disponibles');
        }

        $alumno = Alumnos::create([
            'dni'        => $this->dni,
            'edad'       => $this->edad,
            'apePaterno' => $this->apellido_paterno,
            'apeMaterno' => $this->apellido_materno,
            'nombre'     => $this->nombre,
            'apoderado'  => $this->apoderado,
            'telefono'   => $this->celular_apoderado,
            'direccion'  => $this->direccion_apoderado,
        ]);

        Inscripciones::create([
            'alumnos_id'  => $alumno->id,
            'talleres_id' => $taller->id,
        ]);
        
    });

    $this->resetInputFields();
    }
    private function resetInputFields(){
        $this->dni='';
        $this->edad='';
        $this->apellido_paterno='';
        $this->apellido_materno='';
        $this->nombre=null;
        $this->apoderado='';
        $this->celular_apoderado='';
        $this->direccion_apoderado='';
        $this->taller='';
    }   
    
    public function render()
    {
        $talleres =Talleres::where('estado', 'activo')->get();
        return view('livewire.inscripciones.frm-inscripciones',compact('talleres'));
    }

  
}
