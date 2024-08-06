<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Habitaciones Disponibles</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Buscar Habitaciones Disponibles</h1>
        <form action="{{ url('/habitaciones/disponibles') }}" method="POST" onsubmit="return validateDates()">
            @csrf
            Fecha de Inicio: <input type="date" name="fechaInicio" id="fechaInicio" min="{{ \Carbon\Carbon::today()->toDateString() }}" required><br>
            Fecha de Fin: <input type="date" name="fechaFin" id="fechaFin" required><br>
            Cantidad de Ocupantes: <input type="number" name="ocupantes" min="1" max="5" required><br>
            <input type="submit" value="Buscar">
        </form>
        
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
    </div>
    
    <script>
        function validateDates() {
            var fechaInicio = document.getElementById('fechaInicio').value;
            var fechaFin = document.getElementById('fechaFin').value;

            if (new Date(fechaFin) <= new Date(fechaInicio)) {
                alert("La fecha de salida no puede ser anterior a la fecha de llegada.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
