@extends ('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de tareas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear tarea</a>
    </div>
    @foreach($tasks as $task)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"> {{ $task->title }}</h5>
                <p class="card-text">{{ Str::limit($task->detail, 200) }}</p>
                <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                @can('update', $task)
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Editar</a>
                @endcan
                
                @can('delete', $task)
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar tarea?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
@endsection