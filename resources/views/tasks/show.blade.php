@extends('layouts.app')
@section('content')
    <h1>{{ $tasks->title }}</h1>
    <p>{{ $tasks->detail }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Regresar</a>
@endsection