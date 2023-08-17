@extends('adminlte::page')

@section('title', 'Editar Planificacion')

@section('content_header')
    <h1>Editar Fase I - Planificacion</h1>
@stop

@section('content')
    <form action="{{route('planifications.update',$planification->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="administrative_process_id" value="{{$planification->administrativeProcess->id}}" />
                <div class="col-sm-12">
                    <label for="description" class="form-label text-uppercase">Fase I - Planificacion</label>
                    <textarea cols="30" rows="2" name="description" id="description" class="form-control" placeholder="DESCRIBA LA FASE DE PLANIFICACION" autofocus autocomplete="description">{{ $planification->description }}</textarea>
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