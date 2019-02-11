@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
<form action="/trainers" class="form-group" method="POST" enctype="multipart/form-data">
    @csrf  <!-- Directiva Blade Seguridad  proteccion falsificacion de solicitudes entre sitios -->
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="entrenador" class="form-control"> 
    </div>
    <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar"> 
        </div>

    <button class="btn btn-primary" type="submit">Guardar</button>
</form>
@endsection
