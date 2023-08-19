<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\AdministrativeProcess;
use App\Models\Direction;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class DirectionController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.direction.create', compact('process'));
    }

    function store(ProcessRequest $request){

        $direction = Direction::create([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);

        $process = AdministrativeProcess::find($direction->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creo la fase de direccion del proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    function edit($id){
        $direction = Direction::find($id);
        return view('processes.direction.edit',compact('direction'));
    }

    function update(ProcessRequest $request, $id){

        $direction = Direction::find($id);

        $newDirection = $direction->update([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);

        $process = AdministrativeProcess::find($direction->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se actualizo la fase de direccion del proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $direction = Direction::find($request->direction_id);
        $direction->finish = $request->finish;

        $date_finish = now();
        $direction->date_finish = $date_finish;

        $process = AdministrativeProcess::find($direction->administrative_process_id);
        $control = $process->control;

        $control->update([
            'date_init' => $date_finish
        ]);

        $control->fresh();

        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se finalizo la fase de direccion del proyecto : ' . $project->name;
        $activity->save();

        $direction->save();

        notify()->success('¡La fase de direccion fue finalizada!','¡Proceso Exitoso!');
        
        return response()->json(['Aprobado' => 'La fase de direccion fue finalizada!']);
    }
}
