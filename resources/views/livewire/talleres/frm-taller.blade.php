<div>
    <form action="">
        <div class="form-group">
            <label for="nombreTaller">Nombre del Taller *</label>
            <input type="text" class="form-control" id="nombreTaller" placeholder="Ingrese el nombre del taller"
                wire:model="nombreTaller">
            <div>
                @error('nombreTaller')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="horarioTaller">Horario del Taller (horas)</label>
            <textarea class="form-control" id="horarioTaller" rows="3" placeholder="Ingrese los horarios del taller"
                wire:model="horarioTaller"></textarea>
            <div>
                @error('horarioTaller')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="form-group">
            <label for="cupoEstudiantes">Cupo de Estudiantes *</label>
            <input type="text" class="form-control" id="cupoEstudiantes"
                placeholder="Ingrese la cantidad de cupos del taller" wire:model="cupoEstudiantes">
            <div>
                @error('cupoEstudiantes')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" wire:click="guardarTaller">Guardar Taller</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>


    </form>
</div>
@script
<script>
    $wire.on('taller-registrado', () => {
        $('#exampleModal').modal('hide')
    });
     $wire.on('abrir-modal-edicion', (event) => {
        $('#exampleModal').modal('show')

    });
    
</script>
@endscript