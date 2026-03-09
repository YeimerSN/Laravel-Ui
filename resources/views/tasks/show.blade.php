@extends('layouts.app')
@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->content }}</p>
    <a href="{{ route('task.index') }}" class="btn btn-secondary">Regresar</a>
@endsection