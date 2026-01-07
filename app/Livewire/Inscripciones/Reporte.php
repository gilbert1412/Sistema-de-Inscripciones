<?php

namespace App\Livewire\Inscripciones;

use App\Models\Inscripciones;
use App\Models\Talleres;
use Livewire\Component;

class Reporte extends Component
{
    public $tallerId = null;
    public $buscar = '';

    public function filtrarPorTaller($id)
    {
        $this->tallerId = $id ?: null;
    }

    public function mostrarTodos()
    {
        $this->tallerId = null;
        $this->buscar = '';
    }

    public function render()
    {
        $inscripciones = Inscripciones::with(['alumno', 'taller'])
            ->where('estado', 'activo')

            // FILTRO POR TALLER
            ->when($this->tallerId, function ($query) {
                $query->where('talleres_id', $this->tallerId);
            })

            // FILTRO POR NOMBRE O DNI
            ->when($this->buscar, function ($query) {
                $query->whereHas('alumno', function ($q) {
                    $q->where('nombre', 'like', '%' . $this->buscar . '%')
                        ->orWhere('dni', 'like', '%' . $this->buscar . '%');
                });
            })

            ->get();

        $talleres = Talleres::where('estado', 'activo')->get();

        return view('livewire.inscripciones.reporte', [
            'inscripciones' => $inscripciones,
            'talleres' => $talleres,
        ]);
    }

    public function editar($id)
    {
        return redirect()->route('inscripciones.edit', $id);
       
    }
}
