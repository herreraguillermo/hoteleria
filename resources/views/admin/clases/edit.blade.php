@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Huésped</h1>
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
        {{--  <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="imagen" class="form-control" id="imagen" name="imagen" value="{{ old('imagen', $clases->imagen) }}" required>
        </div>  --}}
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
