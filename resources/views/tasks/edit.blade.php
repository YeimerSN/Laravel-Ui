@extends ('layouts.app')
@section('content')
    <h1>Editar Tarea</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.update', $tasks) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Titulo</label>
            <input name="title" class="form-control" value="{{ old('title', $tasks->title) }}"> </div>
        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="detail" rows="6" class="form-control">{{ old('content', $tasks->detail) }}</textarea>
        </div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
@endsection