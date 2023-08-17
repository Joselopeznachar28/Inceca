@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <form action="{{route('clients.update',$client)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL CONTACTO" autofocus autocomplete="name" value="{{ $client->name }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="company" class="form-label">Empresa</label>
                    <input type="text" name="company" id="company" class="form-control" placeholder="NOMBRE DE LA EMPRESA" autofocus autocomplete="company" value="{{ $client->company }}">
                    @error('company')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="identification" class="form-label">Rif</label>
                    <input type="number" name="identification" id="identification" class="form-control" placeholder="INGRESE RIF DE LA EMPRESA" autofocus autocomplete="identification" value="{{ $client->identification }}">
                    @error('identification')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-4">
                    <label for="phone" class="form-label">Telefono de Contacto</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="NOMBRE DEL CONTACTO" autofocus autocomplete="phone" value="{{ $client->phone }}">
                    @error('phone')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="email" class="form-label">Correo</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="NOMBRE DE LA EMPRESA" autofocus autocomplete="email" value="{{ $client->email }}">
                    @error('email')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="category_id" class="form-label">Campo de Trabajo</label>
                    <select name="category_id" id="category_id" class="form-control" autofocus required>
                        <option value=" ">-- Seleccione una Opcion --</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-4">
                    <label for="country" class="form-label">Pais</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="INGRESE EL NOMBRE DEL PAIS" autofocus autocomplete="country" value="{{ $client->country }}">
                    @error('country')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="INGRESE EL NOMBRE DEL ESTADO" autofocus autocomplete="state" value="{{ $client->state }}">
                    @error('state')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="INGRESE EL NOMBRE DE LA CIUDAD" autofocus autocomplete="city" value="{{ $client->city }}">
                    @error('city')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="address" class="form-label">Dirrecion</label>
                    <textarea name="address" id="address" cols="30" rows="2" placeholder="INGRESE UNA DIRECCION" class="form-control">{{ $client->address }}</textarea>
                    @error('address')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" onclick="return confirm('Desea actualizar los datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
            </div>
        </div>
    </form>
@endsection