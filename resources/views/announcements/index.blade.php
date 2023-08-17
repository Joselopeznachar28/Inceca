@extends('adminlte::page')

@section('title' , 'Anuncios')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Anuncios</h1>
    <form action="{{route('announcements.index')}}" method="get">
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
                        @can('announcements.destroy')
                            <form action="{{route('announcements.destroy', $announcement)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('announcements.edit')
                            <a href="{{route('announcements.edit', $announcement)}}"><ion-icon name="create" class="edit"></ion-icon></a>
                        @endcan
                        @can('announcements.show')
                            <a href="{{route('announcements.show', $announcement)}}"><ion-icon name="information-circle" class="info"></ion-icon></a>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$announcements->links()}}</b></span>
@endsection