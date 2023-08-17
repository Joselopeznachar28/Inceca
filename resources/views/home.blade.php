@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="d-flex justify-content-center">
        <div style="width: 50% !important; height: 50% !important;">
            <canvas id="myGrafic"></canvas>
        </div>
    </div><br>
    <div class="d-grid grid-template-columns-2 gap-3 text-uppercase">
        <div>
            <h4 class="h4">Instalaciones</h4>
            <table class="table table-striped" style="background: rgba(75, 192, 192, 0.2) !important;">
                <thead class="text-center">
                    <tr>
                        <th>Categoria</th>
                        <th>Codigo</th>
                        <th>Cliente</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($installations as $installation)
                        <tr>
                            <td>{{$installation->name}}</td>
                            <td>{{$installation->code}}</td>
                            <td>{{$installation->client->name}}</td>
                            <td>{{$installation->area->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h4 class="h4">Categorias</h4>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Categoria</th>
                        <th>Codigo</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->code}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
    <div class="d-grid grid-template-columns-2 gap-3 text-uppercase">
        <div>
            <h4 class="h4">Clientes</h4>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Compañia</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->company}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->category->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h4 class="h4">Areas</h4>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Area</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th>Direccion Corta</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{$area->name}}</td>
                            <td>{{$area->state}}</td>
                            <td>{{$area->city}}</td>
                            <td>{{$area->address}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
    <div class="d-grid grid-template-columns-2 gap-3 text-uppercase">
        <div>
            <h4 class="h4">Proyectos</h4>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>ID Instalacion</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->name}}</td>
                            <td>{{$project->code}}</td>
                            <td>{{$project->installation_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h4 class="h4">Anuncios</h4>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Fecha</th>
                        <th>Proyecto</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{$announcement->name}}</td>
                            <td>{{$announcement->code}}</td>
                            <td>{{$announcement->date}}</td>
                            <td>{{$announcement->project->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
@endsection

@section('adminlte_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script> const arrayData = @json($arrayData);</script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection