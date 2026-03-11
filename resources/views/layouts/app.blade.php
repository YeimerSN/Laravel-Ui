<!DOCTYPE html>
<html lang="es"> 
    <head>
        <meta charset="utf-8">
        <title>Laravel UI CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Seguridad Web</a>
                @role('admin')
                    <a class="navbar-brand" href="{{ route('users.index') }}">Usuarios</a>
                    <a class="navbar-brand" href="{{ route('tasks.index') }}">Tareas</a>
                @endrole
                <ul class="navbar-nav ms-auto">
                    @guest
                        <div class="d-flex">
                            <li class="nav-item px-2"><a class="nav-link" href="{{ route('login') }}">Login</a></li> 
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li> 
                        </div>
                    @else
                        <li class="nav-item">
                            <span class="nav-link">Hola, {{ Auth::user()->name }}</span> 
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline"> 
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button> 
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div class="container py-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const confirmDeleteModal = document.getElementById('confirmDeleteModal');
                if (confirmDeleteModal) {
                    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
                        const button = event.relatedTarget;
                        const actionUrl = button.getAttribute('data-action');
                        const form = document.getElementById('deleteForm');
                        form.setAttribute('action', actionUrl);
                    });
                }
            });
        </script>
    </body>
</html>
