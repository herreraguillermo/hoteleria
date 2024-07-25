@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Habitaciones</h1>
    <a href="{{ route('admin.habitaciones.create') }}" class="btn btn-primary">Agregar Habitación</a>
    <table class="table">
        <thead>
            <tr>
                <th>Número</th>
                <th>Precio</th>
                <th>Capacidad</th>
                <th>Clase</th>
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
