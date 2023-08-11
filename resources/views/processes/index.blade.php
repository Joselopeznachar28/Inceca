@extends('adminlte::page')

@section('title' , 'Procesos Administrativos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Procesos Administrativos</h1>
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
                    <td><a href="{{route('planifications.create',$process->id)}}" class="btn btn-outline-info">Planificacion</a></td>
                @endif
                @if ($process->organization)
                    <td><span>{{ $process->organization->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    <td><a href="{{route('organizations.create',$process->id)}}" class="btn btn-outline-info">Organizacion</a></td>
                @endif
                @if ($process->direction)
                    <td><span>{{ $process->direction->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    <td><a href="{{route('directions.create',$process->id)}}" class="btn btn-outline-info">Direccion</a></td>
                @endif
                @if ($process->control)
                    <td><span>{{ $process->control->finish == 1 ? '¡Fase Culminada!' : '¡Fase Creada!' }}</span></td>
                @else
                    <td><a href="{{route('controls.create',$process->id)}}" class="btn btn-outline-info">Control</a></td>
                @endif
                <td class="d-flex justify-content-center">
                    {{-- <form action="{{route('processes.destroy',$process)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                    </form> 
                    <a href="{{route('processes.edit',$process)}}" class="btn btn-outline-warning">Editar</a>--}}
                    <a href="{{route('processes.show',$process)}}" class="btn btn-outline-info">Detalle</a></td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection