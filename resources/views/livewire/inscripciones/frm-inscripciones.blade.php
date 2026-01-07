<div class="container-fluid py-4">
    <div class="row g-4">

        <!-- FORMULARIO ALUMNO -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0 fw-bold text-primary">Formulario del Alumno</h5>
                </div>

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">DNI</label>
                            <input type="text" class="form-control" placeholder="Ingrese DNI" wire:model="dni">
                            @error('dni')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Edad</label>
                            <input type="number" class="form-control" placeholder="Edad del alumno" wire:model="edad">
                            @error('edad')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Apellido Paterno</label>
                            <input type="text" class="form-control" placeholder="Apellido paterno"
                                wire:model="apellido_paterno">
                            @error('apellido_paterno')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Apellido Materno</label>
                            <input type="text" class="form-control" placeholder="Apellido materno"
                                wire:model="apellido_materno">
                            @error('apellido_materno')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Nombres</label>
                            <input type="text" class="form-control" placeholder="Nombres completos"
                                wire:model="nombre">
                            @error('nombre')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- FORMULARIO INSCRIPCIÓN -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0 fw-bold text-primary">Formulario de Inscripción</h5>
                </div>

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-12">
                            <label class="form-label fw-semibold">Apoderado</label>
                            <input type="text" class="form-control" placeholder="Nombre del apoderado"
                                wire:model="apoderado">
                            @error('apoderado')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Celular</label>
                            <input type="text" class="form-control" placeholder="Celular del apoderado"
                                wire:model="celular_apoderado">
                            @error('celular_apoderado')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Dirección</label>
                            <input type="text" class="form-control" placeholder="Dirección del apoderado"
                                wire:model="direccion_apoderado">
                            @error('direccion_apoderado')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12  pt-1 mt-1">
                            <label class="form-label fw-semibold">Taller</label>
                            <select class="form-control" wire:model="taller">
                                <option value="">Seleccione un taller</option>
                                @foreach ($talleres as $taller)
                                    <option value="{{ $taller->id }}">
                                        {{ $taller->nombre }}das
                                    </option>
                                @endforeach
                            </select>
                            @error('taller')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>



                        <div class="col-12 text-end mt-3">
                            <button class="btn btn-primary px-4" wire:click="guardarInscripcion">
                                Guardar Inscripción
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
