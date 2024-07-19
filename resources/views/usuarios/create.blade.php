<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="/usuarios" method="POST">
        @csrf
        Nombre: <input type="text" name="Nombre"><br>
        País: <input type="text" name="Nacionalidad"><br>
        Documento: <input type="text" name="Documento"><br>
        Pasaporte: <input type="text" name="Pasaporte"><br>
        Email: <input type="email" name="Email"><br>
        Teléfono: <input type="text" name="Telefono"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
