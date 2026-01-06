<?php


namespace App\Livewire\Talleres;
use Livewire\Component;
use App\Models\Talleres;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
class FrmTaller extends Component
{
    #[Validate('required')] 
    public $nombreTaller='';
    #[Validate('required')] 
    public $horarioTaller='';
    #[Validate('required|integer')] 
    public $cupoEstudiantes;

    public $tallerId;

    public function guardarTaller()
    {
        $this->validate();

        Talleres::updateOrCreate(
            [
                'id' => $this->tallerId ?? null,
            ],
            [
            'nombre' => $this->nombreTaller,
            'horario' => $this->horarioTaller,
            'cupo' => $this->cupoEstudiantes,
        ]);
        $this->dispatch('taller-registrado'); 
        // Reset form fields after saving
        $this->resetForm();

        session()->flash('message', 'Taller creado exitosamente.');
    }
    private function resetForm()
    {
        $this->nombreTaller = '';
        $this->horarioTaller = '';
        $this->tallerId = null;
        $this->cupoEstudiantes = 0;
    }  
    #[On('editar-taller')]
    public function cargarTaller($id)
    {
        $taller = Talleres::find($id);
        if ($taller) {
            $this->nombreTaller = $taller->nombre;
            $this->horarioTaller = $taller->horario;
            $this->cupoEstudiantes = $taller->cupo;
            $this->tallerId = $taller->id;
        }
        $this->dispatch('abrir-modal-edicion');
    }
    public function render()
    {
        
        return view('livewire.talleres.frm-taller');
    }
}
