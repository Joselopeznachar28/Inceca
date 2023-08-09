@extends('adminlte::page')

@section('title' , 'Instalaciones')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Instalaciones</h1>
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
                <th>Codigo</th>
                <th>Instalacion</th>
                <th>Cliente / Compañia</th>
                <th>Area</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($installations as $installation)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$installation->code}}</td>
                    <td>{{$installation->name}}</td>
                    <td>{{$installation->client->name . ' / ' . $installation->client->company}}</td>
                    <td>{{$installation->area->name}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('installations.destroy', $installation)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                        </form>
                        <a href="{{route('installations.edit', $installation)}}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{route('projects.create', $installation)}}" class="btn btn-outline-success">Agregar Proyectos</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection