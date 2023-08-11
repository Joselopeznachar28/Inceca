@extends('adminlte::page')

@section('title', 'Editar Direccion')

@section('content_header')
    <h1>Editar Fase III - Direccion</h1>
@stop

@section('content')
    <form action="{{route('directions.update',$direction)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="administrative_process_id" value="{{$direction->administrativeProcess->id}}" />
                <div class="col-sm-12">
                    <label for="description" class="form-label text-uppercase">Fase III - Direccion</label>
                    <textarea cols="30" rows="2" name="description" id="description" class="form-control" placeholder="DESCRIBA LA FASE DE DIRECCION" autofocus autocomplete="description">{{ $direction->description }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="date_init" class="form-label">Fecha de Inicio</label>
                    <input type="date" name="date_init" id="date_init" class="form-control" value="{{ $direction->date_init }}">
                </div>
                <div class="col-sm-3 m-b-s-a">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Desea actualizar estos datos?')">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
@endsection