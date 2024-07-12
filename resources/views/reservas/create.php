<!DOCTYPE html>
<html>
<head>
    <title>Crear Reserva</title>
</head>
<body>
    <h1>Crear Reserva</h1>
    <form action="/reservas/store" method="POST">
        Usuario ID: <input type="text" name="idUsuario"><br>
        Habitación ID: <input type="text" name="idHabitacion"><br>
        Fecha de Inicio: <input type="date" name="Fecha_checkin"><br>
        Fecha de Fin: <input type="date" name="Fecha_checkout"><br>
        Cantidad de Huespedes: <input type="text" name="Cant_huespedes"><br>
        <input type="submit" value="Reservar">
    </form>
</body>
</html>
