<!DOCTYPE html>
<html>
<head>
    <title>Habitaciones Disponibles</title>
</head>
<body>
    <h1>Habitaciones Disponibles</h1>
    <form action="/reservas/crear" method="POST">
        <?php foreach ($habitaciones as $habitacion): ?>
            <div>
                <p>Número: <?= $habitacion->Numero; ?></p>
                <p>Precio: <?= $habitacion->Precio; ?></p>
                <p>Capacidad: <?= $habitacion->Capacidad; ?></p>
                <p>Clase: <?= $habitacion->Clase; ?></p>
                <input type="radio" name="idHabitacion" value="<?= $habitacion->idHabitacion; ?>"> Seleccionar
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Reservar">
    </form>
</body>
</html>
