@extends('layouts.admin')

@section('content')

<div class="container">
    <h1>Crear Huésped</h1>

    <form id="huespedForm" action="{{ route('huesped.store') }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        @csrf
        <div>
            <label for="Nombre">Nombre:</label>
            <input type="text" name="Nombre" value="{{ old('Nombre') }}" maxlength="255" required>
        </div>
        <div>
            <label for="Documento">Documento:</label>
            <input type="text" name="Documento" value="{{ old('Documento') }}" maxlength="20" required>
        </div>
        <div>
            <label for="Nacionalidad">Nacionalidad:</label>
            <input type="text" name="Nacionalidad" value="{{ old('Nacionalidad') }}" maxlength="20" required>
            <small id="nacionalidadError" style="color: red; display: none;">Debe tener 20 caracteres o menos.</small>
        </div>
        <div>
            <label for="Email">Email:</label>
            <input type="email" name="Email" value="{{ old('Email') }}" maxlength="255" required>
        </div>
        <div>
            <label for="Telefono">Teléfono:</label>
            <input type="text" name="Telefono" value="{{ old('Telefono') }}" maxlength="15" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
    
    <script>
        document.getElementById('huespedForm').addEventListener('submit', function(event) {
            var nacionalidadInput = document.querySelector('input[name="Nacionalidad"]');
            var nacionalidadError = document.getElementById('nacionalidadError');
            
            if (nacionalidadInput.value.length > 20) {
                nacionalidadError.style.display = 'block';
                event.preventDefault(); // Evita el envío del formulario
            } else {
                nacionalidadError.style.display = 'none';
            }
        });
    </script>
    
</div>
@endsection
