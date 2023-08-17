@extends('adminlte::page')

@section('title', 'Editar Control')

@section('content_header')
    <h1>Editar Fase IV - Control</h1>
@stop

@section('content')
    <form action="{{route('controls.update',$control->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="administrative_process_id" value="{{$control->administrativeProcess->id}}" />
                <div class="col-sm-12">
                    <label for="description" class="form-label text-uppercase">Fase IV - Control</label>
                    <textarea cols="30" rows="2" name="description" id="description" class="form-control" placeholder="DESCRIBA LA FASE DE CONTROL" autofocus autocomplete="description">{{ $control->description }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-3 m-b-s-a">
                    <button type="submit" onclick="return confirm('Desea actualizar estos datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection