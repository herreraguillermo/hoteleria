<!DOCTYPE html>
<html>
<head>
    <title>Reservar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="frente">Datos para la reserva</h1>
        <form action="{{ route('Huespedes.store') }}" method="POST">
            @csrf
            <input type="hidden" name="idHabitacion" value="{{ request('idHabitacion') }}">
            <input type="hidden" name="fechaInicio" value="{{ request('fechaInicio') }}">
            <input type="hidden" name="fechaFin" value="{{ request('fechaFin') }}">
            <input type="hidden" name="ocupantes" value="{{ request('ocupantes') }}">

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre" required>
            </div>

            <div class="form-group">
                <label for="Nacionalidad">País:</label>
                <input type="text" id="Nacionalidad" name="Nacionalidad" required>
            </div>

            <div class="form-group">
                <label for="Documento">Documento/ ID:</label>
                <input type="text" id="Documento" name="Documento" required>
            </div>

            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" required>
            </div>

            <div class="form-group">
                <label for="Telefono">Teléfono:</label>
                <input type="text" id="Telefono" name="Telefono" required>
            </div>

            <button type="submit" class="submit-button">Guardar</button>
        </form>
    </div>
</body>
</html>
