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
                <h3> {{ $habitacion->Clase }} {{ $habitacion->Numero }}</h3>
                <p>Precio: {{ $habitacion->Precio }} US$</p>
                <p>Capacidad: {{ $habitacion->Capacidad }}</p>
                <form action="/usuarios/create" method="GET">
                    @csrf
                    <input type="hidden" name="idHabitacion" value="{{ $habitacion->idHabitacion }}">
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
