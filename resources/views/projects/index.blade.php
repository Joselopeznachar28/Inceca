@extends('adminlte::page')

@section('title' , 'Proyectos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Proyectos</h1>
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
                <th>Proyecto</th>
                <th>Instalacion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($projects as $project)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$project->code}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->installation_id}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('projects.destroy', $project)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                        </form>
                        <a href="{{route('projects.edit', $project)}}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{route('projects.show', $project)}}" class="btn btn-outline-info">Detalles</a>
                        <a href="{{route('announcements.create', $project)}}" class="btn btn-outline-info">Agregar Aviso</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection