<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Habitación</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="frente">Buscar Habitación</h1> <br>
        <form id="primerform" name="primerform" action="{{ url('/habitaciones/disponibles') }}" method="POST" onsubmit="return validateDates()">
            @csrf
            <label for="fechaInicio">Fecha de Arribo:</label>
            <input type="date" name="fechaInicio" id="fechaInicio" min="{{ \Carbon\Carbon::today()->toDateString() }}" required>
            
            <label for="fechaFin">Fecha de Partida:</label>
            <input type="date" name="fechaFin" id="fechaFin" required>
            
            <label for="ocupantes">Cantidad de Ocupantes:</label>
            <input type="number" name="ocupantes" min="1" max="5" required>
            
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
