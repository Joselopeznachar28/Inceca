@extends('adminlte::page')

@section('title', 'Crear Aviso')

@section('content_header')
    <h1>Crear Aviso</h1>
@stop

@section('content')
    <form action="{{route('announcements.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="project_id" id="project_id" value="{{$project->id}}">
                <div class="col-sm-4">
                    <label for="project_id" class="form-label">Proyecto</label>
                    <input type="text"class="form-control" readonly disabled value="{{$project->name}}">
                </div>
                <div class="col-sm-4">
                    <label for="name" class="form-label">Aviso - Nombre Indicativo</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE INDICATIVO DEL AVISO" autofocus autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>               
                <div class="col-sm-4">
                    <label for="date" class="form-label">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control" placeholder="FECHA DEL AVISO O NOTIFICACION" autofocus autocomplete="date" value="{{ old('date') }}">
                    @error('date')
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
                    <button type="submit" onclick="return confirm('Desea guardar estos datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection