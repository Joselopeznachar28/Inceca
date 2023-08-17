<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="text-transform: uppercase;">
    <!-- Proyecto -->
    <div style=" width: 50%; float: right;">
        <label for="installation_id" class="form-label">Instalacion : </label>
        <span>{{ $installation->name }}</span>
    </div>
    <div style=" width: 50%; float: left; text-align: end;">
        <label for="name" class="form-label">Proyecto : </label>
        <span>{{$project->name}}</span>
    </div>
    <div class="col-sm-12">
        <label for="description" class="form-label">Descripcion del Proyecto : </label>
        <span>{{ $project->description}}</span>
    </div><br>
    <!-- Proceso Administrativo -->
    <!-- Fase I -->
    <hr><h2>Proceso Administrativo</h2><hr>
    <h3>Fase I : Planificacion</h3>
    @if (!empty($project->administrativeProcess->planification))
        <p><span class="font-weight-bold">Inicio :</span> {{ !empty($project->administrativeProcess->planification->date_init) ? $project->administrativeProcess->planification->date_init : '¡Esta fase aun no ha iniciado!'}}</p>
        <p><span class="font-weight-bold">Descripcion :</span> {{ $project->administrativeProcess->planification->description }}</p>
        <p><span class="font-weight-bold">Culminacion :</span> {{ $project->administrativeProcess->planification->finish == 1 ? $project->administrativeProcess->planification->date_finish : '¡Esta Fase aun no ha culminado!' }}</p>
    @else
        <p>¡Esta Fase aun no ha sido creada!</p>
    @endif
    <!-- Fase II -->
    <h3>Fase II : Organizacion</h3>
    @if (!empty($project->administrativeProcess->organization))
        <p><span class="font-weight-bold">Inicio :</span> {{ $project->administrativeProcess->organization->date_init ? $project->administrativeProcess->organization->date_init : '¡Esta fase aun no ha iniciado!'}}</p>
        <p><span class="font-weight-bold">Descripcion :</span> {{ $project->administrativeProcess->organization->description }}</p>
        <p><span class="font-weight-bold">Culminacion :</span> {{ $project->administrativeProcess->organization->finish == 1 ? $project->administrativeProcess->organization->date_finish : '¡Esta Fase aun no ha culminado!' }}</p>
    @else
        <p>¡Esta Fase aun no ha sido creada!</p>
    @endif
    <!-- Fase III -->
    <h3>Fase III : Direccion</h3>
    @if (!empty($project->administrativeProcess->direction))
        <p><span class="font-weight-bold">Inicio :</span> {{ $project->administrativeProcess->direction->date_init ? $project->administrativeProcess->direction->date_init : '¡Esta fase aun no ha iniciado!'}}</p>
        <p><span class="font-weight-bold">Descripcion :</span> {{ $project->administrativeProcess->direction->description }}</p>
        <p><span class="font-weight-bold">Culminacion :</span> {{ $project->administrativeProcess->direction->finish == 1 ? $project->administrativeProcess->direction->date_finish : '¡Esta Fase aun no ha culminado!' }}</p>
    @else
        <p>¡Esta Fase aun no ha sido creada!</p>
    @endif
    <!-- Fase IV -->
    <h3>Fase IV : Control</h3>
    @if (!empty($project->administrativeProcess->control))
        <p><span class="font-weight-bold">Inicio :</span> {{ $project->administrativeProcess->control->date_init ? $project->administrativeProcess->control->date_init : '¡Esta fase aun no ha iniciado!'}}</p>
        <p><span class="font-weight-bold">Descripcion :</span> {{ $project->administrativeProcess->control->description }}</p>
        <p><span class="font-weight-bold">Culminacion :</span> {{ $project->administrativeProcess->control->finish == 1 ? $project->administrativeProcess->control->date_finish : '¡Esta Fase aun no ha culminado!' }}</p>
    @else
        <p>¡Esta Fase aun no ha sido creada!</p>
    @endif
    <!-- Anuncios -->
    <hr><h2>Anuncios / Avisos</h2><hr>
    @php
        $count = 1;
    @endphp

    @foreach ($project->announcements as $announcement)

        <p> {{$count . ' • ' . $announcement->name . ' : ' . $announcement->description . ' . ' . $announcement->date}}</p>

        @php
            $count++;
        @endphp

    @endforeach

    <div class="row">
        <div class="col-sm-3">
            <a type="button" href="{{ route('projects.index') }}"><ion-icon name="arrow-round-back" class="info"></ion-icon></a>
        </div>
    </div><br>
</body>
</html>
