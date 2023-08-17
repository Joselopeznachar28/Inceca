@extends('adminlte::page')

@section('title' , 'Categorias')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Categorias</h1>
    @can('categories.create')
        <a href="{{route('categories.create')}}"><ion-icon name="add-circle" class="submit"></ion-icon></a>
    @endcan
    <form action="{{route('categories.index')}}" method="get">
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
                <th>Categoria</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$categorie->code}}</td>
                    <td>{{$categorie->name}}</td>
                    <td class="d-flex justify-content-center">
                        @can('categories.destroy')
                            <form action="{{route('categories.destroy', $categorie)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Desea eliminar este Registro?')"><ion-icon name="trash" class="delete"></ion-icon></button>
                            </form>
                        @endcan
                        @can('categories.edit')
                            <a href="{{route('categories.edit', $categorie)}}"><ion-icon name="create" class="edit"></ion-icon></a>
                        @endcan
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
    <span style="text-align: right"><b>{{$categories->links()}}</b></span>
@endsection