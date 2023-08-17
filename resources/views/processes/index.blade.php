@extends('adminlte::page')

@section('title' , 'Procesos Administrativos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Procesos Administrativos</h1>
    <form action="{{route('processes.index')}}" method="get">
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
                <th>Proyecto</th>
                <th>Planificacion</th>
                <th>Organizacion</th>
                <th>Direccion</th>
                <th>Control</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($processes as $process)
            <tr>
                <td>{{$count}}</td>
                <td>{{$process->code}}</td>
                <td>{{$process->project->name}}</td>
                @if ($process->planification)
                    <td><span>{{ $process->planification->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    @can('planifications.create')
                        <td><a href="{{route('planifications.create',$process->id)}}"><ion-icon name="add-circle" class="submit"></ion-icon></a></td>
                    @endcan
                @endif
                @if ($process->organization)
                    <td><span>{{ $process->organization->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    @can('organizations.create')
                        <td><a href="{{route('organizations.create',$process->id)}}"><ion-icon name="add-circle" class="submit"></ion-icon></a></td>
                    @endcan
                @endif
                @if ($process->direction)
                    <td><span>{{ $process->direction->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    @can('directions.create')
                        <td><a href="{{route('directions.create',$process->id)}}"><ion-icon name="add-circle" class="submit"></ion-icon></a></td>
                    @endcan
                @endif
                @if ($process->control)
                    <td><span>{{ $process->control->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    @can('controls.create')
                        <td><a href="{{route('controls.create',$process->id)}}"><ion-icon name="add-circle" class="submit"></ion-icon></a></td>
                    @endcan
                @endif
                <td class="d-flex justify-content-center">
                    {{-- <form action="{{route('processes.destroy',$process)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                    </form> 
                    <a href="{{route('processes.edit',$process)}}" class="btn btn-outline-warning">Editar</a>--}}
                    @can('processes.show')
                        <a href="{{route('processes.show',$process)}}"><ion-icon name="information-circle" class="info"></ion-icon></a></td>
                    @endcan
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$processes->links()}}</b></span>
@endsection