<html>
<head>
    <title>Buscar Habitaciones</title>
</head>
<body>
    <h1>Buscar Habitaciones Disponibles</h1>
    <form action="{{ url('/habitaciones/disponibles') }}" method="POST">
        @csrf
        Fecha de Inicio: <input type="date" name="fechaInicio" required><br>
        Fecha de Fin: <input type="date" name="fechaFin" required><br>
        Cantidad de Ocupantes: <input type="number" name="ocupantes" required><br>
        <input type="submit" value="Buscar">
    </form>
    
    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
    
</body>
</html>