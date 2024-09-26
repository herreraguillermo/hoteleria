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
        <form action="{{ route('habitaciones.disponibles') }}" method="GET" class="ordenar-precio-form">
            @csrf
            <label for="orden">Precio:</label>
            <select name="orden" id="orden" onchange="this.form.submit()">
                <option value="asc" {{ request('orden') == 'asc' ? 'selected' : '' }}>De menor a mayor</option>
                <option value="desc" {{ request('orden') == 'desc' ? 'selected' : '' }}>De mayor a menor</option>
            </select>
            
            <!-- Pasar los parámetros ya existentes para conservar la búsqueda -->
            <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
            <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
            <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">
        </form>
        <!-- Formulario para cambiar moneda -->
        <form method="GET" action="{{ route('habitaciones.disponibles') }}">
            <label for="moneda">Mostrar precios en:</label>
            <select name="moneda" id="moneda" onchange="this.form.submit()">
                <option value="USD" {{ request('moneda') == 'USD' ? 'selected' : '' }}>Dólares (USD)</option>
                <option value="ARS" {{ request('moneda') == 'ARS' ? 'selected' : '' }}>Pesos Argentinos (ARS)</option>
            </select>
            <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
            <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
            <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">
        </form>
        @if (count($habitaciones) > 0)
            <div class="habitaciones-lista">
                @foreach ($habitaciones as $habitacion)
                <div class="habitacion" >
                    <div class="habitacion-info">
                        
                        @php
                            // Conversión de precio
                            $precioPorNoche = $habitacion->Clase->precio;
                            $moneda = request('moneda', 'USD'); // USD por defecto
                            $tasaCambio = 1200; // Ejemplo de tasa de cambio. Ajustar según sea necesario.
                            if ($moneda == 'ARS') {
                                $precioPorNoche *= $tasaCambio; // Convertir a pesos argentinos
                            }
                        @endphp

                        <h3>Por noche: {{ number_format($precioPorNoche, 2) }} {{ $moneda }}</h3>
                        <p>{{ $habitacion->Clase->nombre }} {{ $habitacion->Numero }}</p>
                        <p>Precio total: {{ number_format($diferenciaDias * $precioPorNoche, 2) }} {{ $moneda }}</p>
                        
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
                        $imagen = $habitacion->Clase->imagen ?? 'default.jpg'; // Usa la imagen de la clase o la imagen por defecto
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
                    {{--  <img src="{{ asset('images/clases/' . $imagen) }}" alt="Imagen de la habitación">  --}}
                     
                
                    
                    
                    <img src="{{ asset('images/clases/' . $imagen) }}" alt="{{ $habitacion->Clase }}" class="imagen-habitacion"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $habitacion->clase->descripcion }}"
                    >
                
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