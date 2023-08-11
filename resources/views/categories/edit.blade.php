@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <form action="{{route('categories.update', $category)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus autocomplete="name" value="{{ $category->name }}">
                    @error('name')
                        <span style="color: red;">• {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-3 m-b-s-a">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Desea actualizar los datos?')">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
@endsection