@extends('adminlte::page')

@section('title', 'Crear Cliente')

@section('content_header')
    <h1>Crear Cliente</h1>
@stop

@section('content')
    <form action="{{route('clients.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL CONTACTO" autofocus autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="company" class="form-label">Empresa</label>
                    <input type="text" name="company" id="company" class="form-control" placeholder="NOMBRE DE LA EMPRESA" autofocus autocomplete="company" value="{{ old('company') }}">
                    @error('company')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="identification" class="form-label">Rif</label>
                    <input type="number" name="identification" id="identification" class="form-control" placeholder="INGRESE RIF DE LA EMPRESA" autofocus autocomplete="identification" value="{{ old('identification') }}">
                    @error('identification')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-4">
                    <label for="phone" class="form-label">Telefono de Contacto</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="NOMBRE DEL CONTACTO" autofocus autocomplete="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="email" class="form-label">Correo</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="NOMBRE DE LA EMPRESA" autofocus autocomplete="email" value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="category_id" class="form-label">Campo de Trabajo</label>
                    <select name="category_id" id="category_id" class="form-control" autofocus>
                        <option value=" ">-- Seleccione una Opcion --</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label for="country" class="form-label">Pais</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="INGRESE EL NOMBRE DEL PAIS" autofocus autocomplete="country" value="{{ old('country') }}">
                    @error('country')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="INGRESE EL NOMBRE DEL ESTADO" autofocus autocomplete="state" value="{{ old('state') }}">
                    @error('state')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="INGRESE EL NOMBRE DE LA CIUDAD" autofocus autocomplete="city" value="{{ old('city') }}">
                    @error('city')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="address" class="form-label">Dirrecion</label>
                    <textarea name="address" id="address" cols="30" rows="2" placeholder="INGRESE UNA DIRECCION" class="form-control">{{ old('address') }}</textarea>
                    @error('address')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-success" onclick="return confirm('Desea guardar estos datos?')">Guardar</button>
            </div>
        </div>
    </form>
@endsection