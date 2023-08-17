@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL USUARIO" autofocus autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="lastname" class="form-label">Apellido</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="APELLIDO DEL USUARIO" autofocus autocomplete="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="identification" class="form-label">Identificacion</label>
                    <input type="number" name="identification" id="identification" class="form-control" placeholder="INGRESE NUMERO DE IDENTIFICACION" autofocus autocomplete="identification" value="{{ old('identification') }}">
                    @error('identification')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="INGRESE UN NOMBRE DE USUARIO" autofocus autocomplete="username" value="{{ old('username') }}">
                    @error('username')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="INGRESE UN EMAIL" autofocus autocomplete="email" value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="INGRESE UNA CONTRASEÑA" autofocus autocomplete="password" value="{{ old('password') }}">
                    @error('password')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="password" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="REPITA LA CONTRASEÑA" autofocus autocomplete="password" value="{{ old('password') }}">
                    @error('password')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="h4 p-2 text-uppercase">Roles y Permisos</h2><hr>
            <div class="d-grid grid-template-columns-4">
                @foreach ($roles as $role)
                    <div class="form-check form-switch">
                        <input type="checkbox" name="role_id[]" id="role" class="form-check-input" value="{{ $role->id }}">
                        <label for="role_id" class="form-check-label">{{ $role->name }}</label>
                        @foreach ($role->permissions as $permission)
                            <p>• {{ $permission->description }}</p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" onclick="return confirm('Desea guardar estos datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
            </div>
        </div>
    </form>
@endsection