@extends('adminlte::page')

@section('title', 'Detalles de Proyecto')

@section('content_header')
    <h1>Detalles del Proyecto : {{ $project->name }}</h1>
@stop

@section('content')
    <!-- Proyecto -->
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label for="installation_id" class="form-label">Instalacion</label>
                {{-- <input type="text" name="installation_id" id="installation_id" class="form-control" readonly disabled value='{{ $project->installacion->name }}' autocomplete="installation_id"> --}}
            </div>
            <div class="col-sm-6">
                <label for="name" class="form-label">Proyecto</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL PROYECTO" autofocus autocomplete="name" value="{{$project->name}}" disabled readonly>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12">
                <label for="description" class="form-label">Descripcion del Proyecto</label>
                <textarea name="description" id="description" cols="30" rows="2" placeholder="INGRESE UNA DESCRIPCION" class="form-control" readonly disabled>{{ $project->description}}</textarea>
            </div>
        </div><br>
    </div>
    <!-- Anuncios -->
    <hr><h2>Anuncios / Avisos</h2><hr>
    @php
        $count = 1;
    @endphp

    @foreach ($project->announcements as $announcement)

        <p> {{$count . ' • ' . $announcement->name . ' : ' . $announcement->description . ' . ' . $announcement->date}}</p>

        @php
            $count++;
        @endphp

    @endforeach

    <div class="row">
        <div class="col-sm-3">
            <a type="button" href="{{ route('projects.index') }}" class="btn btn-info">Regresar</a>
        </div>
    </div>
@endsection
