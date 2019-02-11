@extends('layouts.app')

@section('title', 'Trainers Edit')

@section('content')
<form action="/trainers/{{$trainer->slug}}" class="form-group" method="POST" enctype="multipart/form-data">
    @method('PUT')  <!-- Directiva de blade html no soporta put o pathc  o acciones delete  por eso se envia de forma ocupta con blade -->
    @csrf  <!-- Directiva Blade Seguridad  proteccion falsificacion de solicitudes entre sitios -->
    <div class="form-group">
        <label for="">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{$trainer->name}}"> 
    </div>
    <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar"> 
        </div>

    <button class="btn btn-primary" type="submit">Actualizar</button>
</form>
@endsection
