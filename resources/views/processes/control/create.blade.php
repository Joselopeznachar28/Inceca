@extends('adminlte::page')

@section('title', 'Crear Control')

@section('content_header')
    <h1>Crear Fase IV - Control</h1>
@stop

@section('content')
    <form action="{{route('controls.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="administrative_process_id" value="{{$process->id}}" />
                <div class="col-sm-12">
                    <label for="description" class="form-label text-uppercase">Fase IV - Control</label>
                    <textarea cols="30" rows="2" name="description" id="description" class="form-control" placeholder="DESCRIBA LA FASE DE CONTROL" autofocus autocomplete="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="date_init" class="form-label">Fecha de Inicio</label>
                    <input type="date" name="date_init" id="date_init" class="form-control">
                </div>
                <div class="col-sm-3 m-b-s-a">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Desea guardar estos datos?')">Guardar</button>
                </div>
            </div>
        </div>
    </form>
@endsection