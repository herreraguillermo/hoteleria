<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="/usuarios/store" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        Teléfono: <input type="text" name="telefono"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
