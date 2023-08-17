@extends('adminlte::page')

@section('title', 'Crear Organizacion')

@section('content_header')
    <h1>Crear Fase II - Organizacion</h1>
@stop

@section('content')
    <form action="{{route('organizations.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="administrative_process_id" value="{{$process->id}}" />
                <div class="col-sm-12">
                    <label for="description" class="form-label text-uppercase">Fase II - Organizacion</label>
                    <textarea cols="30" rows="2" name="description" id="description" class="form-control" placeholder="DESCRIBA LA FASE DE ORGANIZACION" autofocus autocomplete="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-3 m-b-s-a">
                    <button type="submit" onclick="return confirm('Desea guardar estos datos?')"><ion-icon name="checkmark-circle" class="submit"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection