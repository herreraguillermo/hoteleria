<!DOCTYPE html>
<html>
<head>
    <title>Habitaciones Disponibles</title>
</head>
<body>
    <h1>Habitaciones Disponibles</h1>
    @if (count($habitaciones) > 0)
        <div>
            
            @foreach ($habitaciones as $habitacion)
            <div>
                <h3> {{ $habitacion->Clase}} {{$habitacion->Numero }}</h3>
                <p>Precio: {{ $habitacion->Precio }} US$</p>
                <p>Capacidad: {{ $habitacion->Capacidad }}</p>
                <form action="{{ route('Huespedes.create') }}" method="GET">
                    @csrf
                    <input type="hidden" name="idHabitacion" value="{{ $habitacion->idHabitacion }}">
                    <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
                    <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
                    <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">
                    <button type="submit">Reservar</button>
                </form>
            </div>
            @endforeach
        </div>
        
    @else
        <p>No hay habitaciones disponibles para las fechas y ocupantes seleccionados.</p>
    @endif
</body>
</html>
