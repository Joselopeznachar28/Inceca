@extends('adminlte::page')

@section('title' , 'Usuarios')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Usuarios</h1>
    @can('users.create')
        <a href="{{ route('users.create') }}"><ion-icon name="add-circle" class="submit"></ion-icon></a>
    @endcan
    <form action="{{route('users.index')}}" method="get">
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
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Identificacion</th>
                <th>Email</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($users as $user)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$user->code}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->identification}}</td>
                    <td>{{$user->email}}</td>
                    <td class="d-flex justify-content-center">
                        @can('users.destroy')
                            <form action="{{route('users.destroy', $user)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('users.edit')
                            <a href="{{route('users.edit', $user)}}"><ion-icon name="create" class="edit"></ion-icon></a>
                        @endcan
                        @can('users.show')
                            <a href="{{route('users.show',$user)}}"><ion-icon name="information-circle" class="info"></ion-icon></a>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$users->links()}}</b></span>
@endsection