@extends('adminlte::page')

@section('title' , 'Proyectos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Proyectos</h1>
    <form action="{{route('projects.index')}}" method="get">
        <div class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Filtrar">
            <button type="submit"><ion-icon name="search" class="submit form-inline"></ion-icon></button>
        </div>
    </form>
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
                <th>Id Instalacion</th>
                <th>Proyecto</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($projects as $project)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$project->code}}</td>
                    <td>{{$project->installation_id}}</td>
                    <td>{{$project->name}}</td>
                    <td class="d-flex justify-content-center">
                        @can('projects.destroy')
                            <form action="{{route('projects.destroy', $project)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('projects.edit')
                            <a href="{{route('projects.edit', $project)}}"><ion-icon name="create" class="edit"></ion-icon></a>
                        @endcan
                        @can('projects.pdf')
                            <a href="{{route('projects.pdf', $project)}}"><ion-icon name="paper" class="info"></ion-icon></a>
                        @endcan
                        @can('announcements.create')
                            <a href="{{route('announcements.create', $project)}}"><ion-icon name="warning" class="submit"></ion-icon></a>
                        @endcan
                        @can('processes.store')
                            <form action="{{ route('processes.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                @if (!($project->administrativeProcess))
                                    <button type="submit" onclick="return confirm('Desea generar el proceso administrativo?')"><ion-icon name="repeat" class="submit"></ion-icon></button>
                                @endif
                            </form>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$projects->links()}}</b></span>
@endsection