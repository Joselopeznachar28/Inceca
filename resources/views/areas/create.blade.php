@extends('adminlte::page')

@section('title', 'Crear Area')

@section('content_header')
    <h1>Crear Area</h1>
@stop

@section('content')
    <form action="{{route('areas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="INGRESE UN NOMBRE DE AREA" autofocus autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="INGRESE UN NOMBRE DE AREA" autofocus autocomplete="state" value="{{ old('state') }}">
                    @error('state')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="INGRESE UN NOMBRE DE CIUDAD" autofocus autocomplete="city" value="{{ old('city') }}">
                    @error('city')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="address" class="form-label">Direccion</label>
                    <textarea name="address" id="address" cols="30" rows="2" placeholder="INGRESE DIRECCION CORTA" autofocus autocomplete="address" class="form-control">{{ old('address') }}</textarea>
                    @error('address')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" onclick="return confirm('Desea guardar estos datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
            </div>
        </div>
    </form>
@endsection