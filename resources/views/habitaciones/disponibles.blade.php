<!DOCTYPE html>
<html>
<head>
    <title>Habitaciones Disponibles</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="frente">Habitaciones Disponibles</h1>
        @if (count($habitaciones) > 0)
            <div class="habitaciones-lista">
                @foreach ($habitaciones as $habitacion)
                <div class="habitacion">
                    <h3> {{ $habitacion->Clase}} {{$habitacion->Numero }}</h3>
                    <p>Precio: {{ $habitacion->Precio }} US$</p>
                    <p>Capacidad: {{ $habitacion->Capacidad }}</p>
                    <form action="{{ route('Huespedes.create') }}" method="GET">
                        @csrf
                        <input type="hidden" name="idHabitacion" value="{{ $habitacion->idHabitacion }}">
                        <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
                        <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
                        <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">
                        <button type="submit" class="submit-button">Reservar</button>
                    </form>
                </div>
                @endforeach
            </div>
        @else
            <p>No hay habitaciones disponibles para las fechas y ocupantes seleccionados.</p>
        @endif
    </div>
</body>
</html>
