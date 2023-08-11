@extends('adminlte::page')

@section('title', 'Detalles de Aviso')

@section('content_header')
    <h1>Detalles</h1>
@stop

@section('content')
    <!-- Anuncio -->
    <h4> Nombre : {{$announcement->name }}</h4>
    <h4> Descripcion : {{ $announcement->description }}</h4>
    <h4> Fecha : {{ $announcement->date }}</h4>
    <div class="row">
        <div class="col-sm-3">
            <a type="button" href="{{ route('announcements.index') }}" class="btn btn-info">Regresar</a>
        </div>
    </div>
@endsection
