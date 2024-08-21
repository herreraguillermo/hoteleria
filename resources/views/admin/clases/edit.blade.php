@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Clase</h1>
    <form action="{{ route('admin.clases.update', $clases->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre de la clase</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $clases->nombre)  }}" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" min="0" step="1" class="form-control" id="precio" name="precio" value="{{ old('precio', $clases->precio) }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="descripcion" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $clases->descripcion) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
