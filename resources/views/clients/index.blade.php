@extends('adminlte::page')

@section('title' , 'Clientes')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Clientes</h1>
    <a href="{{route('clients.create')}}" class="btn btn-outline-success">Añadir</a>
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
                        <form action="{{route('clients.destroy', $client)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                        </form>
                        <a href="{{route('clients.edit', $client)}}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{route('installations.create', $client)}}" class="btn btn-outline-success">Agregar Instalacion</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection