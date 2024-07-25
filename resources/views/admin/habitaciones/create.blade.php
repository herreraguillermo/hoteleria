@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Habitación</h1>
    <form action="{{ route('admin.habitaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Numero">Número</label>
            <input type="text" class="form-control" id="Numero" name="Numero" required>
        </div>
        <div class="form-group">
            <label for="Precio">Precio</label>
            <input type="number" class="form-control" id="Precio" name="Precio" required>
        </div>
        <div class="form-group">
            <label for="Capacidad">Capacidad</label>
            <input type="number" class="form-control" id="Capacidad" name="Capacidad" required>
        </div>
        <div class="form-group">
            <label for="Clase">Clase</label>
            <input type="text" class="form-control" id="Clase" name="Clase" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
