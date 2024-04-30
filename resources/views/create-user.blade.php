@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-3 ml-5">Crear nuevo usuario</h1>

    <div class="ml-5">
        <x-back-button></x-back-button>
    </div>

    @if (session('success'))
        <div class="alert alert-success w-50 m-auto mb-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
@stop

@section('content')
<div class="w-50 m-auto mt-2">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <h5 class="fs-5 mb-3">Informacion del usuario</h5>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Usuario</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ej. Juan Sanchez Gonzalez">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico del Usuario</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Ej. jsanchez@mail.com">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña del Usuario</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="***********">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña del Usuario</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="***********">
        </div>

        <button type="submit" class="btn btn-primary mb-5">Registrar</button>
    </form>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop