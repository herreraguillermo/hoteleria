<!DOCTYPE html>
<html>
<head>
    <title>Habitaciones Disponibles</title>
</head>
<body>
    <h1>Habitaciones Disponibles</h1>
    @if (count($habitaciones) > 0)
        <form action="{{ url('/reservas/crear') }}" method="POST">
            @csrf
            @foreach ($habitaciones as $habitacion)
                <div>
                    <p>Número: {{ $habitacion->Numero }}</p>
                    <p>Precio: {{ $habitacion->Precio }}</p>
                    <p>Capacidad: {{ $habitacion->Capacidad }}</p>
                    <p>Clase: {{ $habitacion->Clase }}</p>
                    <input type="radio" name="idHabitacion" value="{{ $habitacion->idHabitacion }}"> Seleccionar
                </div>
            @endforeach
            <input type="submit" value="Reservar">
        </form>
        
    @else
        <p>No hay habitaciones disponibles para las fechas y ocupantes seleccionados.</p>
    @endif
</body>
</html>
