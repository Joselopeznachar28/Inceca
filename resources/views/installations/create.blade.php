@extends('adminlte::page')

@section('title', 'Crear Instalacion')

@section('content_header')
    <h1>Crear Instalacion</h1>
@stop

@section('content')
    <form action="{{route('installations.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label for="client_id" class="form-label">Empresa</label>
                    <input type="text" name="client_id" id="client_id" class="form-control" readonly placeholder='{{ $client->name }}' autocomplete="client_id" value="{{$client->id}}">
                    @error('client_id')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="name" class="form-label">Instalacion</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DE LA INSTALACION" autofocus autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>               
                <div class="col-sm-4">
                    <label for="area_id" class="form-label">Area</label>
                    <select name="area_id" id="area_id" class="form-control">
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
                    <textarea name="description" id="description" cols="30" rows="2" placeholder="INGRESE UNA DIRECCION" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Desea guardar estos datos?')">Guardar</button>
                </div>
            </div>
        </div>
    </form>
@endsection