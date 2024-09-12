@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Reservas</h1>

    {{--  Formulario de búsqueda  --}}
    <form method="GET" action="{{ route('admin.reserva.index') }}">
        <input type="text" name="documento" value="{{ request('documento') }}" placeholder="Buscar por documento">
        <button type="submit">Buscar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th><a href="{{ route('admin.reserva.index', ['sort' => 'Fecha_checkin', 'order' => ($sort == 'Fecha_checkin' && $order == 'asc') ? 'desc' : 'asc']) }}">Check-in</a></th>
                <th><a href="{{ route('admin.reserva.index', ['sort' => 'Fecha_checkout', 'order' => ($sort == 'Fecha_checkout' && $order == 'asc') ? 'desc' : 'asc']) }}">Check-out</a></th>
                <th>Huésped</th>
                <th>Habitación</th>
                <th>ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->Fecha_checkin }}</td>
                <td>{{ $reserva->Fecha_checkout }}</td>
                <td>{{ $reserva->huesped->Nombre }}</td>
                <td>{{ $reserva->habitacion->Numero }}</td>
                <td>{{$reserva->huesped->Documento}}</td>
                <td>
                    <a href="{{ route('admin.reservas.edit', $reserva->idReserva) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.reservas.destroy', $reserva->idReserva) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete('{{ $reserva->huesped->nombre }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{--  Paginación  --}}
    {{ $reservas->links() }}
</div>

@endsection
