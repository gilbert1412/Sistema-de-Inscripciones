<div>
     <div class="card">
        <form action="">
            <div class="card-header">
                <h4>Formulario de Inscripciones</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre del Estudiante</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del estudiante" wire:model="nombre">
                </div>
                <div class="form-group">
                    <label for="taller">Seleccionar Taller</label>
                    <select class="form-control" id="taller" wire:model="taller">
                        <option value="">-- Seleccione un taller --</option>
                        @foreach($talleres as $taller)
                            <option value="{{ $taller->id }}">{{ $taller->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de Inscripción</label>
                    <input type="date" class="form-control" id="fecha" wire:model="fecha"> 
                </div>
            </div>
        </form>
     </div>
</div>
