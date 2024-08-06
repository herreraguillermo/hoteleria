@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Huéspedes</h1>
    {{--  <a href="{{ route('admin.huespedes.create') }}" class="btn btn-primary">Agregar Huésped</a>  --}}
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Nacionalidad</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($huespedes as $huesped)
            <tr>
                <td>{{ $huesped->Nombre }}</td>
                <td>{{ $huesped->Documento }}</td>
                <td>{{ $huesped->Nacionalidad }}</td>
                <td>{{ $huesped->Email }}</td>
                <td>{{ $huesped->Telefono }}</td>
                <td>
                    <a href="{{ route('admin.huespedes.edit', $huesped->idHuesped) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.huespedes.destroy', $huesped->idHuesped) }}" method="POST" style="display:inline-block;">
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