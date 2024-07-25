@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Panel de Administración</h1>
    <p>Bienvenido al panel de administración. Desde aquí puedes gestionar habitaciones, reservas y huéspedes.</p>
    <ul>
        <li><a href="{{ route('admin.habitaciones.index') }}">Gestionar Habitaciones</a></li>
        <li><a href="{{ route('admin.reservas.index') }}">Gestionar Reservas</a></li>
        <li><a href="{{ route('admin.huespedes.index') }}">Gestionar Huéspedes</a></li>
    </ul>
</div>
@endsection



