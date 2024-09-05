@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Habitación</h1>
    <form action="{{ route('admin.habitaciones.update', $habitacion->idHabitacion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Numero">Número</label>
            <input type="number" min="0" step="1" class="form-control" id="Numero" name="Numero" value="{{ old('Numero', $habitacion->Numero) }}" required>
        </div>
        <div class="form-group">
            <label for="Capacidad">Capacidad</label>
            <input type="number" min="1" step="1" class="form-control" id="Capacidad" name="Capacidad" value="{{ old('Capacidad', $habitacion->Capacidad) }}" required>
        </div>
        <div class="form-group">
            <label for="Clase">Clase</label>
            <select class="form-control" id="Clase" name="Clase" required>
                <option value="" disabled {{ !old('Clase') && is_null($habitacion->Clase) ? 'selected' : '' }}>Seleccione una clase</option>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id }}" 
                        {{ (old('Clase') ?: $habitacion->Clase?->id) == $clase->id ? 'selected' : '' }}>
                        {{ $clase->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

