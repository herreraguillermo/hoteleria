@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Clase</h1>
    <form action="{{ route('admin.clases.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" min="0" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="clase">Nombre de la Clase</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="imagen">Subir imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
        <div class="form-group">
            <label for="clase">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection