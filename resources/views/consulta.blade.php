@extends('layouts.app')

@section('content')
    <h1>Consultar Disponibilidad</h1>

    <form action="{{ route('disponibilidad') }}" method="GET">
        @csrf
        <div>
            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" required>
        </div>
        <div>
            <label for="fecha_egreso">Fecha de Egreso:</label>
            <input type="date" name="fecha_egreso" id="fecha_egreso" required>
        </div>
        <button type="submit">Consultar</button>
    </form>
@endsection
