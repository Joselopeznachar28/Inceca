@extends('adminlte::page')

@section('title' , 'Clientes')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Clientes</h1>
    @can('clients.create')
        <a href="{{route('clients.create')}}"><ion-icon name="add-circle" class="submit"></ion-icon></a>
    @endcan
    <form action="{{route('clients.index')}}" method="get">
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
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Rif</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($clients as $client)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$client->category->name}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->company}}</td>
                    <td>{{$client->identification}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td class="d-flex justify-content-center">
                        @can('clients.destroy')
                            <form action="{{route('clients.destroy', $client)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('clients.edit')
                            <a href="{{route('clients.edit', $client)}}"><ion-icon name="create" class="edit"></ion-icon></a>    
                        @endcan
                        @can('installations.create')
                            <a href="{{route('installations.create', $client)}}"><ion-icon name="business" class="submit"></ion-icon></a>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$clients->links()}}</b></span>
@endsection