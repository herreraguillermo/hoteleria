<!DOCTYPE html>
<html>
<head>
    <title>Reserva Completa</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="frente">Reserva Completa</h1>
        
        <h2>Datos del Huésped</h2>
        <p><strong>Nombre:</strong> {{ $huesped->Nombre }}</p>
        <p><strong>Nacionalidad:</strong> {{ $huesped->Nacionalidad }}</p>
        <p><strong>Documento:</strong> {{ $huesped->Documento }}</p>
        <p><strong>Email:</strong> {{ $huesped->Email }}</p>
        <p><strong>Teléfono:</strong> {{ $huesped->Telefono }}</p>

        <h2>Datos de la Reserva</h2>
        <p><strong>Fecha de Check-in:</strong> {{ $reserva->Fecha_checkin }}</p>
        <p><strong>Fecha de Check-out:</strong> {{ $reserva->Fecha_checkout }}</p>
        <p><strong>Habitación:</strong> {{ $reserva->habitacion->Numero }}</p>
        <p><strong>Cantidad de Huéspedes:</strong> {{ $reserva->Cant_huespedes }}</p>

        <a href="{{ url('/') }}" class="back-link">Volver a la Página Principal</a>
    </div>
</body>
</html>
