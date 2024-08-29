<!DOCTYPE html>
<html>
<head>
    <title>Reserva Confirmada</title>
</head>
<body>
    <h1>Reserva Confirmada</h1>
    <p>Estimado {{ $reserva['nombre'] }},</p>
    <p>Tu reserva para el {{ $reserva['fecha'] }} ha sido confirmada.</p>
    <p>Detalles de la reserva:</p>
    <ul>
        <li>Nombre: {{ $reserva['nombre'] }}</li>
        <li>Fecha: {{ $reserva['fecha'] }}</li>
        <li>Hora: {{ $reserva['hora'] }}</li>
    </ul>
</body>
</html>
