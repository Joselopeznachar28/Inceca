@extends('adminlte::page')

@section('title' , 'Instalaciones')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Instalaciones</h1>
    <form action="{{route('installations.index')}}" method="get">
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
                        @can('installations.destroy')
                            <form action="{{route('installations.destroy', $installation)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('installations.edit')
                            <a href="{{route('installations.edit', $installation)}}"><ion-icon name="create"    class="edit"></ion-icon></a>
                        @endcan
                        @can('projects.create')
                            <a href="{{route('projects.create', $installation)}}"><ion-icon name="logo-buffer" class="submit"></ion-icon></a>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$installations->links()}}</b></span>
@endsection