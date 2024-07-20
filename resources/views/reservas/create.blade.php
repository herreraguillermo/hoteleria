<!DOCTYPE html>
<html>
<head>
    <title>Crear Reserva</title>
</head>
<body>
    <h1>Crear Reserva</h1>
    <form action="/reservas" method="POST">
        @csrf
        <input type="hidden" name="idHuesped" value="{{ request()->input('idHuesped') }}">
        <input type="hidden" name="idHabitacion" value="{{ request()->input('idHabitacion') }}">
        
        <label for="Fecha_checkin">Fecha de Check-in:</label>
        <input type="date" id="Fecha_checkin" name="Fecha_checkin" required>
        
        <label for="Fecha_checkout">Fecha de Check-out:</label>
        <input type="date" id="Fecha_checkout" name="Fecha_checkout" required>
        
        <label for="Cant_huespedes">Cantidad de Huéspedes:</label>
        <input type="number" id="Cant_huespedes" name="Cant_huespedes" required>
        
        <button type="submit">Reservar</button>
    </form>
</body>
</html>
