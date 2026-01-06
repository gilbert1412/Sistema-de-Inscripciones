<div>
    <form>

        <div class="mb-3">
            <label for="nombreTaller" class="form-label fw-semibold">
                Nombre del Taller <span class="text-danger">*</span>
            </label>
            <input type="text"
                   class="form-control"
                   id="nombreTaller"
                   placeholder="Ingrese el nombre del taller"
                   wire:model="nombreTaller">

            @error('nombreTaller')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="horarioTaller" class="form-label fw-semibold">
                Horario del Taller (horas)
            </label>
            <textarea class="form-control"
                      id="horarioTaller"
                      rows="3"
                      placeholder="Ej. Lunes a Viernes de 3:00 pm a 5:00 pm"
                      wire:model="horarioTaller"></textarea>

            @error('horarioTaller')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="cupoEstudiantes" class="form-label fw-semibold">
                Cupo de Estudiantes <span class="text-danger">*</span>
            </label>
            <input type="number"
                   class="form-control"
                   id="cupoEstudiantes"
                   placeholder="Ingrese la cantidad de cupos"
                   wire:model="cupoEstudiantes">

            @error('cupoEstudiantes')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <div class="modal-footer px-0">
            <button type="button"
                    class="btn btn-primary px-4"
                    wire:click="guardarTaller">
                Guardar Taller
            </button>

            <button type="button"
                    class="btn btn-outline-secondary px-4"
                    data-dismiss="modal">
                Cancelar
            </button>
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