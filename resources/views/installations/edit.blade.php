@extends('adminlte::page')

@section('title', 'Editar Instalacion')

@section('content_header')
    <h1>Editar Instalacion</h1>
@stop

@section('content')
    <form action="{{route('installations.update',$installation)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="hidden" name="client_id" id="client_id" class="form-control" value="{{$installation->client_id}}">
            <div class="row">
                <div class="col-sm-4">
                    <label for="client_id" class="form-label">Empresa</label>
                    <input type="text" class="form-control" readonly disabled value="{{$installation->client->company}}">
                    @error('client_id')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="name" class="form-label">Instalacion</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DE LA INSTALACION" autofocus autocomplete="name" value="{{ $installation->name }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>               
                <div class="col-sm-4">
                    <label for="area_id" class="form-label">Area</label>
                    <select name="area_id" id="area_id" class="form-control" required>
                        <option value="">-- Seleccione un area --</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="description" class="form-label">Descripcion de la Instalacion</label>
                    <textarea name="description" id="description" cols="30" rows="2" placeholder="INGRESE UNA DIRECCION" class="form-control">{{ $installation->description }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" onclick="return confirm('Desea actualizar estos datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection