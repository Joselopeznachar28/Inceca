@extends('adminlte::page')

@section('title', 'Crear Proyecto')

@section('content_header')
    <h1>Crear Proyecto</h1>
@stop

@section('content')
    <form action="{{route('projects.store')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="installation_id" id="installation_id" value="{{$installation->id}}">
            <div class="row">
                <div class="col-sm-6">
                    <label for="installation_id" class="form-label">Instalacion</label>
                    <input type="text" class="form-control" readonly disabled value="{{$installation->name}}">
                    @error('installation_id')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="name" class="form-label">Proyecto</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL PROYECTO" autofocus autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="description" class="form-label">Descripcion del Proyecto</label>
                    <textarea name="description" id="description" cols="30" rows="2" placeholder="INGRESE UNA DESCRIPCION" class="form-control">{{ old('description') }}</textarea>
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