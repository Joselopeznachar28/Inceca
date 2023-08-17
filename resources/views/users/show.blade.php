@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL USUARIO" autofocus autocomplete="name" value="{{ $user->name }}" disabled readonly>
            </div>
            <div class="col-sm-4">
                <label for="lastname" class="form-label">Apellido</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="APELLIDO DEL USUARIO" autofocus autocomplete="lastname" value="{{ $user->lastname }}" disabled readonly>
            </div>
            <div class="col-sm-4">
                <label for="identification" class="form-label">Identificacion</label>
                <input type="number" name="identification" id="identification" class="form-control" placeholder="INGRESE NUMERO DE IDENTIFICACION" autofocus autocomplete="identification" value="{{ $user->identification }}" disabled readonly>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-6">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="INGRESE UN NOMBRE DE USUARIO" autofocus autocomplete="username" value="{{ $user->username }}" disabled readonly>
            </div>
            <div class="col-sm-6">
                <label for="email" class="form-label">Correo</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="INGRESE UN EMAIL" autofocus autocomplete="email" value="{{ $user->email }}" disabled readonly>
            </div>
        </div><br>
    </div>
    <div class="row">
        <h2 class="h4 p-2 text-uppercase">Roles y Permisos</h2><hr>
        <div class="d-grid grid-template-columns-4">
            @foreach ($user->roles as $role)
                <div class="form-check form-switch">
                    <label for="role_id" class="form-check-label h4">{{ $role->name }}</label>
                    @foreach ($role->permissions as $permission)
                        <p>• {{ $permission->description }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-3">
            <a type="button" href="{{ route('users.index') }}"><ion-icon name="arrow-round-back" class="info"></ion-icon></a>
        </div>
    </div>
@endsection