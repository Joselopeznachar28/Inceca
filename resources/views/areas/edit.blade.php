@extends('adminlte::page')

@section('title', 'Editar Area')

@section('content_header')
    <h1>Editar Area</h1>
@stop

@section('content')
    <form action="{{route('areas.update', $area)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="INGRESE UN NOMBRE DE AREA" autofocus autocomplete="name" value="{{ $area->name }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="INGRESE UN NOMBRE DE AREA" autofocus autocomplete="state" value="{{ $area->state }}">
                    @error('state')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="INGRESE UN NOMBRE DE CIUDAD" autofocus autocomplete="city" value="{{ $area->city }}">
                    @error('city')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label for="address" class="form-label">Direccion</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="INGRESE DIRECCION CORTA" autofocus autocomplete="address" value="{{ $area->address }}">
                    @error('address')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-success" onclick="return confirm('Desea actualizar los datos?')">Actualizar</button>
            </div>
        </div>
    </form>
@endsection