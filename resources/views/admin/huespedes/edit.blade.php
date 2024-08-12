@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Huésped</h1>
    <form action="{{ route('admin.huespedes.update', $huesped->idHuesped) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $huesped->Nombre) }}" required>
        </div>
        <div class="form-group">
            <label for="Nacionalidad">Nacionalidad</label>
            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" value="{{ old('Nacionalidad', $huesped->Nacionalidad) }}" required>
        </div>
        <div class="form-group">
            <label for="Documento">Documento</label>
            <input type="text" class="form-control" id="Documento" name="Documento" value="{{ old('Documento', $huesped->Documento) }}" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ old('Email', $huesped->Email) }}" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="number" min="0" step="1" class="form-control" id="Telefono" name="Telefono" value="{{ old('Telefono', $huesped->Telefono) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
