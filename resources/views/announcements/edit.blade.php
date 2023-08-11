@extends('adminlte::page')

@section('title', 'Editar Aviso')

@section('content_header')
    <h1>Editar Aviso</h1>
@stop

@section('content')
    <form action="{{route('announcements.update',$announcement)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label for="project_id" class="form-label">Proyecto</label>
                    <input type="text" name="project_id" id="project_id" class="form-control" readonly placeholder='{{ $announcement->project_id }}' autocomplete="project_id" value="{{$announcement->project_id}}">
                </div>
                <div class="col-sm-4">
                    <label for="name" class="form-label">Aviso - Nombre Indicativo</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE INDICATIVO DEL AVISO" autofocus autocomplete="name" value="{{ $announcement->name }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>               
                <div class="col-sm-4">
                    <label for="date" class="form-label">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control" placeholder="FECHA DEL AVISO O NOTIFICACION" autofocus autocomplete="date" value="{{ $announcement->date }}">
                    @error('date')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="description" class="form-label">Descripcion de la Instalacion</label>
                    <textarea name="description" id="description" cols="30" rows="2" placeholder="INGRESE UNA DIRECCION" class="form-control">{{ $announcement->description }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Desea actualizar estos datos?')">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
@endsection