@extends ('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de usarios</h1>
        @can('create', App\Models\User::class)
            <a href="{{ route('users.create') }}" class="btn btn-primary">Crear usuario</a>
        @endcan
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->getRoleLabels() as $label)
                            <span>{{ $label }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('view', $user)
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-secondary">Ver</a>
                        @endcan
                        @can('update', $user)
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                        @endcan
                        @can('delete', $user)
                            <button type="button" 
                                    class="btn btn-sm btn-danger" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmDeleteModal" 
                                    data-action="{{ route('users.destroy', $user->id) }}">
                                Eliminar
                            </button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar a este usuario? Esta acción no se puede deshacer.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Si, eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
