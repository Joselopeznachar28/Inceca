@extends('adminlte::page')

@section('title', 'Editar Proceso Administrativo')

@section('content_header')
    <h2 class="text-uppercase">Proceso Administrativo del Proyecto : {{ $process->project->name }}</h2>
@stop

@section('content')
    <form action="{{route('processes.update',$process)}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="project_id" value="{{ $process->project_id }}">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label for="name" class="form-label text-uppercase">Fase I : Planificacion</label>
                    <textarea name="planification" id="planification" cols="30" rows="2" placeholder="DESCRIBA LA FASE DE PLANIFICACION A DETALLE" class="form-control" autofocus>{{ $process->planification }}</textarea>
                    @error('planification')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="organization" class="form-label text-uppercase">Fase II : Organizacion</label>
                    <textarea name="organization" id="organization" cols="30" rows="2" placeholder="DESCRIBA LA FASE DE ORGANIZACION A DETALLE" class="form-control" autofocus>{{ $process->organization }}</textarea>
                    @error('organization')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="direction" class="form-label text-uppercase">Fase III : Direccion</label>
                    <textarea name="direction" id="direction" cols="30" rows="2" placeholder="DESCRIBA LA FASE DE DIRECCION A DETALLE" class="form-control" autofocus>{{ $process->direction }}</textarea>
                    @error('direction')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                    <label for="control" class="form-label text-uppercase">Fase IV : Control</label>
                    <textarea name="control" id="control" cols="30" rows="2" placeholder="DESCRIBA LA FASE DE CONTROL A DETALLE" class="form-control" autofocus>{{ $process->control }}</textarea>
                    @error('control')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-success" onclick="return confirm('Desea guardar estos datos?')">Guardar</button>
            </div>
        </div>
    </form>
@endsection