<div>
     <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Cupos</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTalleres as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td scope="row">{{ $item->nombre }}</td>
                        <td scope="row" class="horario-col" title="{{ $item->horario }}">
                            {{ \Illuminate\Support\Str::limit($item->horario ?? 'No definido', 30) }}
                        </td>
                        <td scope="row">{{ $item->cupo }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" type="button" wire:click="editarTaller({{ $item->id }})">Editar</button>
                            <button class="btn btn-sm btn-danger" wire:click="confirmarEliminacion({{ $item->id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
         </table>{{-- The whole world belongs to you. --}}
</div>
@script
<script>
    $wire.on('confirmar-eliminacion', (event) => {
        if (confirm('¿Está seguro que desea eliminar este registro?')) {
            Livewire.dispatch('eliminar-taller', { id: event.id });
        }
    });
</script>
@endscript