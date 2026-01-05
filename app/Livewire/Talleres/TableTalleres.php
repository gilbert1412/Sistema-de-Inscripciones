<?php

namespace App\Livewire\Talleres;

use Livewire\Component;
use App\Models\Talleres;
use Livewire\Attributes\On; 
class TableTalleres extends Component
{
    public function editarTaller($id)
    {
        $this->dispatch('editar-taller', id: $id);
    }
    public function confirmarEliminacion($id)
    { 
          $this->dispatch('confirmar-eliminacion', id: $id);
    }
    #[On('eliminar-taller')]
    public function eliminarTaller($id)
    {
        $taller = Talleres::find($id);
        if ($taller) {
            $taller->estado = 'inactivo';
            $taller->save();
        }
    }
     #[On('taller-registrado')] 
    public function render()
    { 
        $dataTalleres = Talleres::where('estado','activo')->get();
        return view('livewire.talleres.table-talleres',compact('dataTalleres'));
    }
}
