@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Clases</h1>
        <a href="{{ route('admin.clases.create') }}" class="btn btn-primary">Agregar Clase</a>
    <table class="table">
        <thead>
            <tr>
                <th>Clase</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clases as $clase)
            <tr>
                <td>{{ $clase->nombre }}</td>
                <td>{{ $clase->precio }}</td>
                <td></td>
                <td>
                <a href="{{ route('admin.clases.edit', $clase->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.clases.destroy', $clase->id) }}" method="POST" style="display:inline-block;">
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
