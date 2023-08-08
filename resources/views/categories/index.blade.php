@extends('adminlte::page')

@section('tittle' , 'Categorias')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Categorias</h1>
    <a href="{{route('categories.create')}}" class="btn btn-outline-success">Añadir</a>
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
                <th>Codigo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$categorie->name}}</td>
                    <td>{{$categorie->code}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('categories.destroy', $categorie)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        <a href="{{route('categories.edit', $categorie)}}" class="btn btn-outline-warning">Editar</a>
                        {{-- <a href="{{route('ports.create', $categorie->id)}}" class="btn btn-outline-success">Add Ports</a> --}}
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection