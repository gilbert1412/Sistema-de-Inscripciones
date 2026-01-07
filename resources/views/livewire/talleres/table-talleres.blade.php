<div>

    <!-- Buscador -->
    <div class="d-flex justify-content-end mb-3 px-4">
        <div class="input-group" style="max-width: 320px;">
            <span class="input-group-text bg-light">
                <i class="fas fa-search text-secondary"></i>
            </span>
            <input type="text" class="form-control" placeholder="Buscar taller..." wire:model.live="buscar">
        </div>
    </div>

    <!-- Tabla -->
    <div class="table-responsive px-4">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-primary text-uppercase small">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Cupo</th>
                    <th>Disponibles</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dataTalleres as $item)
                    <tr>
                        <td class="fw-semibold">{{ $item->id }}</td>

                        <td class="text-start fw-semibold">
                            {{ $item->nombre }}
                        </td>

                        <td class="text-start text-muted" title="{{ $item->horario }}">
                            {{ \Illuminate\Support\Str::limit($item->horario ?? 'No definido', 35) }}
                        </td>

                        <td>
                            {{ $item->cupo }}
                        </td>

                        <td>
                            <span class="badge bg-success fs-6 px-3 py-2 text-white">
                                {{ $item->cupo - $item->inscripciones->count() }}
                            </span>
                        </td>

                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <button class="btn btn-sm btn-outline-primary"
                                    wire:click="editarTaller({{ $item->id }})">
                                    Editar
                                </button>

                                <button class="btn btn-sm btn-outline-danger"
                                    wire:click="confirmarEliminacion({{ $item->id }})">
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
@script
    <script>
        $wire.on('confirmar-eliminacion', (event) => {
            if (confirm('¿Está seguro que desea eliminar este registro?')) {
                Livewire.dispatch('eliminar-taller', {
                    id: event.id
                });
            }
        });
    </script>
@endscript
