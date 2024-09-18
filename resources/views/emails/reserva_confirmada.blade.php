<!-- resources/views/emails/reserva_confirmada.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada</title>
</head>
<body>
    <h1>Reserva Confirmada</h1>
    <p>Estimado {{ $Huesped->Nombre }}</p>
    <p>Tu reserva para el {{ $reserva->Fecha_checkin }} ha sido confirmada.</p>
    <p>Detalles de la reserva:</p>
    <ul>
        <li>Nombre: {{ $Huesped->Nombre }}</li>
        <li>Fecha de check-in: {{ $reserva->Fecha_checkin }}</li>
        <li>Fecha de check-out: {{ $reserva->Fecha_checkout }}</li>
        <li>Habitación: {{ $reserva->habitacion->Numero }}</li>
        <li>Cantidad de huéspedes: {{ $reserva->Cant_huespedes }}</li>
        <li>Precio por día: {{ $reserva->habitacion->Clase->precio}} US$</li>
        <li>Precio total:  <strong>{{$diferenciaDias * $reserva->habitacion->Clase->precio}} US$</strong></li>
    </ul>
</body>
</html>
