@extends('adminlte::page')

@section('title', 'Detalles - Proceso Administrativo')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Detalles del Proceso Administrativo : {{ $process->name }}</h1>
        <h1>{{ 'Codigo de Proceso : ' . $process->code . ' / ' . 'Proyecto : ' . $process->project->name}}</h1>
    </div><hr>
@stop

@section('content')
    <!-- Fases -->
    <div>
        <h2 class="text-uppercase">Fase I - Planificacion</h2>
        @if (!$process->planification)
            <p>Fase I - Planificacion, No ha sido creada!</p>
        @else
            <p class="text-uppercase">{{ 'Fecha de Inicio : ' . $process->planification->date_init }}</p>
            <p class="text-uppercase">{{ $process->planification->description }}</p>
            <div class="d-flex justify-content-between">
                @if ($process->planification->finish == 0)
                <div class="form-check form-switch">
                    <input type="checkbox" data-id="{{$process->planification->id}}" role="switch" class="form-check-input planification" data-toggle="toggle" data-on="Enviado" data-off="Enviar" data-style="slow" {{$process->planification->finish == True ? 'checked' : ''}}>
                    <label class="form-check-label">Culminar Fase</label>
                </div>
                <a href="{{ route('planifications.edit',$process->planification->id) }}" class="btn btn-outline-warning">Editar</a>
                @else
                    <span>Esta fase ha culminado!</span>
                @endif
            </div>
        @endif
    </div><hr>
    <div>
        <h2 class="text-uppercase">Fase II - Organizacion</h2>
        @if (!$process->organization)
            <p>Fase II - Organizacion, No ha sido creada!</p>
        @else
            <p class="text-uppercase">{{ 'Fecha de Inicio : ' . $process->organization->date_init }}</p>
            <p class="text-uppercase">{{ $process->organization->description }}</p>
            <div class="d-flex justify-content-between">
                @if ($process->organization->finish == 0)
                <div class="form-check form-switch">
                    <input type="checkbox" role="switch" data-id="{{$process->organization->id}} "class="form-check-input organization" data-toggle="toggle" data-on="Enviado" data-off="Enviar" data-style="slow" {{$process->organization->finish == True ? 'checked' : ''}}>
                    <label class="form-check-label">Culminar Fase</label>
                </div>
                <a href="{{ route('organizations.edit',$process->organization->id) }}" class="btn btn-outline-warning">Editar</a>
                @else
                    <span>Esta fase ha culminado!</span>
                @endif
                </div>
        @endif
    </div><hr>
    <div>
        <h2 class="text-uppercase">Fase III - Direccion</h2>
        @if (!$process->direction)
            <p>Fase III - Direccion, No ha sido creada!</p>
        @else
            <p class="text-uppercase">{{ 'Fecha de Inicio : ' . $process->direction->date_init }}</p>
            <p class="text-uppercase">{{ $process->direction->description }}</p>
            <div class="d-flex justify-content-between">
                @if ($process->direction->finish == 0)
                <div class="form-check form-switch">
                    <input type="checkbox" data-id="{{$process->direction->id}}" role="switch" class="form-check-input direction" data-toggle="toggle" data-on="Enviado" data-off="Enviar" data-style="slow" {{$process->direction->finish == True ? 'checked' : ''}}>
                    <label class="form-check-label">Culminar Fase</label>
                </div>
                    <a href="{{ route('directions.edit',$process->direction->id) }}" class="btn btn-outline-warning">Editar</a>
                @else
                    <span>Esta fase ha culminado!</span>
                @endif
                </div>
        @endif
    </div><hr>
    <div>
        <h2 class="text-uppercase">Fase IV - Control</h2>
        @if (!$process->control)
            <p>Fase IV - Control, No ha sido creada!</p>
        @else
            <p class="text-uppercase">{{ 'Fecha de Inicio : ' . $process->control->date_init }}</p>
            <p class="text-uppercase">{{ $process->control->description }}</p>
            <div class="d-flex justify-content-between">
                @if ($process->control->finish == 0)
                <div class="form-check form-switch">
                    <input type="checkbox" role="switch" data-id="{{$process->control->id}}" class="form-check-input control" data-toggle="toggle" data-on="Enviado" data-off="Enviar" data-style="slow" {{$process->control->finish == True ? 'checked' : ''}}>
                    <label class="form-check-label">Culminar Fase</label>
                </div>
                    <a href="{{ route('controls.edit',$process->control->id) }}" class="btn btn-outline-warning">Editar</a>
                @else
                    <span>Esta fase ha culminado!</span>
                @endif
                </div>
        @endif
    </div><hr>
    <div class="row">
        <div class="col-sm-3">
            <a type="button" href="{{ route('processes.index') }}" class="btn btn-info">Regresar</a>
        </div>
    </div><br>
    @section('adminlte_js')
    <!-- change status planification -->
    <script>
        $('.planification').on('change', function () {
            var finish = $(this).prop('checked') == true ? 1 : 0;
            var planification_id = $(this).data('id');
            $.ajax({
                type : 'GET',
                dataType : 'JSON',
                url : '{{route('changeFinishStatusPlanification')}}',
                data : {
                    'finish' : finish,
                    'planification_id' : planification_id,
                },
                success:function(data) {
                    console.log('La fase de planificacion fue finalizada!');
                }
            });
        });
    </script>
    <!-- change status organization  -->
    <script>
        $('.organization').on('change', function () {
            var finish = $(this).prop('checked') == true ? 1 : 0;
            var organization_id = $(this).data('id');
            $.ajax({
                type : 'GET',
                dataType : 'JSON',
                url : '{{route('changeFinishStatusOrganization')}}',
                data : {
                    'finish' : finish,
                    'organization_id' : organization_id,
                },
                success:function(data) {
                    console.log('La fase de organizacion fue finalizada!');
                }
            });
        });
    </script>
    <!-- change status direction  -->
    <script>
        $('.direction').on('change', function () {
            var finish = $(this).prop('checked') == true ? 1 : 0;
            var direction_id = $(this).data('id');
            $.ajax({
                type : 'GET',
                dataType : 'JSON',
                url : '{{route('changeFinishStatusDirection')}}',
                data : {
                    'finish' : finish,
                    'direction_id' : direction_id,
                },
                success:function(data) {
                    console.log('La fase de direction fue finalizada!');
                }
            });
        });
    </script>
    <!-- change status control  -->
    <script>
        $('.control').on('change', function () {
            var finish = $(this).prop('checked') == true ? 1 : 0;
            var control_id = $(this).data('id');
            $.ajax({
                type : 'GET',
                dataType : 'JSON',
                url : '{{route('changeFinishStatusControl')}}',
                data : {
                    'finish' : finish,
                    'control_id' : control_id,
                },
                success:function(data) {
                    console.log('La fase de control fue finalizada!');
                }
            });
        });
    </script>
    @stop
@endsection
