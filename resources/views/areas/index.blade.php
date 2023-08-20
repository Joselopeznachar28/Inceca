@extends('adminlte::page')

@section('title' , 'Areas')

@section('Sweetalert2',true)
@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Areas</h1>
    @can('areas.create')
        <a href="{{route('areas.create')}}"><ion-icon name="add-circle" class="submit"></ion-icon></a>
    @endcan
    <form action="{{route('areas.index')}}" method="get">
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
                <th>Nombre</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>Ubicacion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($areas as $area)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$area->code}}</td>
                    <td>{{$area->name}}</td>
                    <td>{{$area->state}}</td>
                    <td>{{$area->city}}</td>
                    <td>{{$area->address}}</td>
                    <td class="d-flex justify-content-center">
                        @can('areas.destroy')
                            <form action="{{route('areas.destroy', $area)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('areas.edit')
                            <a href="{{route('areas.edit', $area)}}"><ion-icon name="create" class="edit"></ion-icon></a>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$areas->links()}}</b></span>
@endsection