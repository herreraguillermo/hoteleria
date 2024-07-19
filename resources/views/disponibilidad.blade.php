@extends('layouts.app')

@section('content')
    <h1>Habitaciones Disponibles</h1>

    @if($habitacionesDisponibles->isEmpty())
        <p>No hay habitaciones disponibles en las fechas seleccionadas.</p>
    @else
        <ul>
            @foreach($habitacionesDisponibles as $habitacion)
                <li>{{ $habitacion->numero }} - {{ $habitacion->tipo }} - Capacidad: {{ $habitacion->capacidad }} - Precio: {{ $habitacion->precio }}</li>
            @endforeach
        </ul>
    @endif
@endsection
