<!DOCTYPE html>
<html>
<head>
    <title>Reservar</title>
</head>
<body>
    <h1>Datos para la reserva</h1>
    <form action="{{ route('Huespedes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="idHabitacion" value="{{ request('idHabitacion') }}">
        <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
        <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
        <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">
        Nombre: <input type="text" name="Nombre"><br>
        País: <input type="text" name="Nacionalidad"><br>
        Documento: <input type="text" name="Documento"><br>
        Email: <input type="email" name="Email"><br>
        Teléfono: <input type="text" name="Telefono"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
