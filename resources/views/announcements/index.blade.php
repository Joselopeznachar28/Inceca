@extends('adminlte::page')

@section('title' , 'Anuncios')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Anuncios</h1>
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
                <th>Aviso</th>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($announcements as $announcement)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$announcement->code}}</td>
                    <td>{{$announcement->project->name}}</td>
                    <td>{{$announcement->name}}</td>
                    <td>{{$announcement->date}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('announcements.destroy', $announcement)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                        </form>
                        <a href="{{route('announcements.edit', $announcement)}}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{route('announcements.show', $announcement)}}" class="btn btn-outline-info">Detalles</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection