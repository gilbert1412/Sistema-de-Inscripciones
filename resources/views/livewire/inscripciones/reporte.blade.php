<div class="container-fluid">

    <!-- Título -->
    <div class="mb-3">
        <h5 class="fw-bold text-primary mb-1">
            Registro de Inscripciones
        </h5>
        <small class="text-muted">
            Filtro y visualización de alumnos inscritos por taller
        </small>
    </div>

    <!-- Filtros -->
    <div class="border rounded p-3 mb-4 bg-light">
        <div class="row align-items-center g-2">
            <div class="col-auto">
                <span class="fw-semibold text-secondary">
                    Filtrar por taller:
                </span>
            </div>

            <div class="col">
                <div class="d-flex flex-wrap gap-2">
                    @foreach($talleres as $taller)
                        <button class="btn btn-outline-primary btn-sm"  wire:click="filtrarPorTaller({{ $taller->id }})">
                            {{ $taller->nombre }}
                        </button>
                    @endforeach

                    <button class="btn btn-outline-secondary btn-sm" wire:click="mostrarTodos">
                        Todos
                    </button>
                </div>
            </div>
              <div class="col-md-4">
            <input type="text"
                class="form-control"
                placeholder="Buscar por nombre o DNI"
                wire:model.live="buscar">
        </div>
        </div>
    </div>

    <!-- Tabla -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-primary text-uppercase small">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>DNI</th>
                    <th>Edad</th>
                    <th>Taller</th>
                    <th>Apoderado</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($inscripciones as $inscripcion)
                    <tr>
                        <td class="fw-semibold">{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->alumno->nombre }}</td>
                        <td>{{ $inscripcion->alumno->apePaterno }}</td>
                        <td>{{ $inscripcion->alumno->apeMaterno }}</td>
                        <td>{{ $inscripcion->alumno->dni }}</td>
                        <td>{{ $inscripcion->alumno->edad }}</td>
                        <td class="fw-semibold text-primary">
                            {{ $inscripcion->taller->nombre }}
                        </td>
                        <td>{{ $inscripcion->alumno->apoderado }}</td>
                        <td>{{ $inscripcion->alumno->telefono }}</td>
                        <td>{{ $inscripcion->alumno->direccion }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('inscripciones.edit', $inscripcion->id) }}"
   class="btn btn-sm btn-outline-primary">
    Editar
</a>
                                <button class="btn btn-sm btn-outline-danger">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
