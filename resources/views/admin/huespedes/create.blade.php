@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Huésped</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.huespedes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div class="form-group">
            <label for="Documento">Documento</label>
            <input type="text" class="form-control" id="Documento" name="Documento" value="{{ old('Documento') }}" required>
        </div>
        <div class="form-group">
            <label for="Nacionalidad">Nacionalidad</label>
            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" value="{{ old('Nacionalidad') }}" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ old('Email') }}" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="number" min="0" step="1" class="form-control" id="Telefono" name="Telefono" value="{{ old('Telefono') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Huésped</button>
    </form>
</div>
@endsection
