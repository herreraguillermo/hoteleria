<!DOCTYPE html>
<html>
<head>
    <title>Reserva Completa</title>
</head>
<body>
    <h1>Reserva Completa</h1>
    <h2>Datos del Huésped</h2>
    <p>Nombre: {{ $huesped->Nombre }}</p>
    <p>Nacionalidad: {{ $huesped->Nacionalidad }}</p>
    <p>Documento: {{ $huesped->Documento }}</p>
    <p>Email: {{ $huesped->Email }}</p>
    <p>Teléfono: {{ $huesped->Telefono }}</p>

    <h2>Datos de la Reserva</h2>
    <p>Fecha de Check-in: {{ $reserva->Fecha_checkin }}</p>
    <p>Fecha de Check-out: {{ $reserva->Fecha_checkout }}</p>
    <p>Habitación: {{ $reserva->habitacion->Numero }}</p>
    <p>Cantidad de Huéspedes: {{ $reserva->Cant_huespedes }}</p>

    <a href="{{ url('/') }}">Volver a la Página Principal</a>
</body>
</html>
