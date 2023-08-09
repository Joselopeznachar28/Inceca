@extends('adminlte::page')

@section('title' , 'Areas')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Areas</h1>
    <a href="{{route('areas.create')}}" class="btn btn-outline-success">Añadir</a>
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
                        <form action="{{route('areas.destroy', $area)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Desea eliminar este Registro?')">Borrar</button>
                        </form>
                        <a href="{{route('areas.edit', $area)}}" class="btn btn-outline-warning">Editar</a>
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