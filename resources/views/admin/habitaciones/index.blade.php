@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Habitaciones</h1>
    <a href="{{ route('admin.habitaciones.create') }}" class="btn btn-primary">Agregar Habitación</a>
    <table class="table">
        <thead>
            <tr>
                <th><a href="{{ route('admin.habitaciones.index', ['sort' => 'Numero', 'direction' => $sort === 'Numero' && $direction === 'asc' ? 'desc' : 'asc']) }}">Numero</a></th>
                <th><a href="{{ route('admin.habitaciones.index', ['sort' => 'Precio', 'direction' => $sort === 'Precio' && $direction === 'asc' ? 'desc' : 'asc']) }}">Precio</a></th>
                <th><a href="{{ route('admin.habitaciones.index', ['sort' => 'Capacidad', 'direction' => $sort === 'Capacidad' && $direction === 'asc' ? 'desc' : 'asc']) }}">Capacidad</a></th>
                <th><a href="{{ route('admin.habitaciones.index', ['sort' => 'Clase', 'direction' => $sort === 'Clase' && $direction === 'asc' ? 'desc' : 'asc']) }}">Clase</a></th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($habitaciones as $habitacion)
            <tr>
                <td>{{ $habitacion->Numero }}</td>
                <td>{{ $habitacion->Precio }}</td>
                <td>{{ $habitacion->Capacidad }}</td>
                <td>{{ $habitacion->Clase }}</td>
                <td>
                    <a href="{{ route('admin.habitaciones.edit', ['id' => $habitacion->idHabitacion]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.habitaciones.destroy', ['id' => $habitacion->idHabitacion]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
