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
                    <div class="habitacion-info">

                    <h3>Por noche: {{ $habitacion->Precio }} US$ </h3>
                    <p>{{ $habitacion->Clase}} {{$habitacion->Numero }}</p>
                    <p><strong>Precio total:</strong> {{ $habitacion->precioTotal }} US$ </p>
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

                    @php
                    $imagen = 'default.jpg'; // Imagen por defecto en caso de que la clase no se encuentre
                    switch (strtolower($habitacion->Clase)) {
                        case 'standard':
                            $imagen = 'standard.jpg';
                            break;
                        case 'deluxe':
                            $imagen = 'deluxe.jpg';
                            break;
                        case 'suite':
                            $imagen = 'suite.jpg';
                            break;
                    }
                @endphp
                <img src="{{ asset('images/' . $imagen) }}" alt="{{ $habitacion->Clase }}" class="imagen-habitacion">
                


                </div>
                @endforeach
            </div>
        @else
            <p>No hay habitaciones disponibles para las fechas y ocupantes seleccionados.</p>
        @endif
    </div>
    
    <footer class="footer">
        <p>Proyecto PP3 - Curso 2023 ISFT 38</p>
        <p>Contacto: contacto@mail.com</p>
        <p>Teléfono: 3364508291</p>
    </footer>
</body>
</html>