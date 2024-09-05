@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Habitación</h1>
    <form action="{{ route('admin.habitaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Numero">Número</label>
            <input type="number" min="0" step="1" class="form-control" id="Numero" name="Numero" required>
        </div>
        <div class="form-group">
            <label for="Capacidad">Capacidad</label>
            <input type="number" min="1" step="1" class="form-control" id="Capacidad" name="Capacidad" required>
        </div>
        <div class="form-group">
            <label for="Clase">Clase</label>
            <select class="form-control" id="Clase" name="Clase" required>
                <option value="" disabled selected>Seleccione una clase</option>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
