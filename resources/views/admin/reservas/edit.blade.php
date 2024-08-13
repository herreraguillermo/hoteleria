@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <p>Para el huesped: 
        {{ $huespedes->first()->Nombre }} - {{ $huespedes->first()->Email }}
    </p>
    
    <form action="{{ route('admin.reservas.update', $reserva->idReserva) }}" onsubmit="return validateDates()" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Fecha_checkin">Fecha de Check-in</label>
            <input type="date" class="form-control" id="Fecha_checkin" name="Fecha_checkin" value="{{ old('Fecha_checkin', $reserva->Fecha_checkin->format('Y-m-d')) }}" required>
        </div>
        <div class="form-group">
            <label for="Fecha_checkout">Fecha de Check-out</label>
            <input type="date" class="form-control" id="Fecha_checkout" name="Fecha_checkout" value="{{ old('Fecha_checkout', $reserva->Fecha_checkout->format('Y-m-d')) }}" required>
        </div>
        <div class="form-group">
            <label for="Cant_huespedes">Cantidad de Huéspedes</label>
            <input type="number" min="1" step="1" class="form-control" id="Cant_huespedes" name="Cant_huespedes" value="{{ old('Cant_huespedes', $reserva->Cant_huespedes) }}" required>
        </div>
        <div class="form-group">
            <label for="idHabitacion">Habitación</label>
            <select class="form-control" id="idHabitacion" name="idHabitacion" required>
                @foreach($habitaciones as $habitacion)
                    <option value="{{ $habitacion->idHabitacion }}" {{ $habitacion->idHabitacion == $reserva->idHabitacion ? 'selected' : '' }}>
                        {{ $habitacion->Clase }} {{ $habitacion->Numero }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
<script>
    function validateDates() {
        var fechaInicio = document.getElementById('Fecha_checkin').value;
        var fechaFin = document.getElementById('Fecha_checkout').value;

        if (new Date(fechaFin) <= new Date(fechaInicio)) {
            alert("La fecha de salida no puede ser anterior a la fecha de llegada.");
            return false;
        }
        return true;
    }
</script>