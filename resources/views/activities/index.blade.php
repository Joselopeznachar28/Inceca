@extends('adminlte::page')

@section('title' , 'Historial de Actividades')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Historial de Actividades</h1>
</div>   

@stop

    @php
        $count = 1;        
    @endphp
    
@section('content')
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Nombre y Apellido</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Actividad</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($array as $data)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$data['username']}}</td>
                    <td>{{$data['user']}}</td>
                    <td>{{$data['date']}}</td>
                    <td>{{$data['time']}}</td>
                    <td>{{$data['description']}}</td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection