@extends('adminlte::page')

@section('title', 'Crear Categoria')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="INGRESE UN NOMBRE PARA SU CATEGORIA" autofocus autocomplete="name" required>
                    @error('name')
                        <span style="color: red;">{{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success m-b-s-a">Guardar</button>
                </div>
            </div>
        </div>
    </form>
@endsection