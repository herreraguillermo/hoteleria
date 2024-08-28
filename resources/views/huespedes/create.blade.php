<!DOCTYPE html>
<html>
<head>
    <title>Reservar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="frente">Datos para la reserva</h1>
        <form id="primerform" name="primerform" action="{{ route('Huespedes.store') }}" method="POST">
            @csrf
            <input type="hidden" name="idHabitacion" value="{{ request('idHabitacion') }}">
            <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
            <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
            <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">

            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre" required>

            <label for="Nacionalidad">País:</label>
            <input type="text" id="Nacionalidad" name="Nacionalidad" required>

            <label for="Documento">Documento/ ID:</label>
            <input type="text" id="Documento" name="Documento" required>
            
            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" required>
            
            <label for="Telefono">Teléfono:</label>
            <input type="number" min="0" step="1" minlength="9" maxlength="15" id="Telefono" name="Telefono" required>

            <button type="submit" class="submit-button">Guardar</button>
        </form>
    </div>
    <footer class="footer">
        <p>Proyecto PP3 - Curso 2023 ISFT 38</p>
        <p>Contacto: contacto@mail.com</p>
        <p>Teléfono: 3364508291</p>
    </footer>
</body>
</html>
