@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css/tabladeclases.css') }}">

@section('content')
<div class="container">
    <h1>Clases</h1>
        <a href="{{ route('admin.clases.create') }}" class="btn btn-primary">Agregar Clase</a>
    <table class="table">
        <thead>
            <tr>
                <th>Clase</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clases as $clase)
            <tr>
                <td>{{ $clase->nombre }}</td>
                <td>{{ $clase->precio }}</td>
                <td>{{ $clase->descripcion }}</td>
                <td>
                <a href="{{ route('admin.clases.edit', $clase->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.clases.destroy', $clase->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete('{{ $clase->nombre }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
