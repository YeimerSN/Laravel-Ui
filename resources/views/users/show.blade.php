@extends('layouts.app')
@section('content')
    <h1><strong>Nombre:</strong> {{ $user->name }}</h1>
    <p><span>Correo: </span>{{ $user->email }}</p>
    <p><span>Rol: </span>{{ \App\Enums\RoleType::from($user->roles->first()->name)->roleLabel() }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Regresar</a>
@endsection