<!DOCTYPE html>
<html>
<head>
    <title>Habitaciones Disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="frente">Habitaciones Disponibles</h1>
        @if (count($habitaciones) > 0)
            <div class="habitaciones-lista">
                @foreach ($habitaciones as $habitacion)
                <div class="habitacion" >
                    <div class="habitacion-info">

                        <h3>Por noche: {{ $habitacion->Precio }} US$ </h3>
                        <p> {{ $habitacion->Clase->nombre}} {{$habitacion->Numero }}</p>
                        <p><strong>Precio total:</strong> {{ $habitacion->precioTotal }} US$ </p>
                        <p>Capacidad: {{ $habitacion->Capacidad }}</p>
                        {{--  <p>{{$habitacion->clase->descripcion}}</p>  --}}
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
                    switch (strtolower($habitacion->Clase->nombre)) {
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
                    
                        <img src="{{ asset('images/' . $imagen) }}" alt="{{ $habitacion->Clase }}" class="imagen-habitacion"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $habitacion->clase->descripcion }}"
                        >
                    
                        {{--    --}}
                    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))</script>
</body>
</html>