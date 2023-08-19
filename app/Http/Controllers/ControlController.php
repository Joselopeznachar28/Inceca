<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\AdministrativeProcess;
use App\Models\Control;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ControlController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.control.create', compact('process'));
    }

    function store(ProcessRequest $request){

        $control = Control::create([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);

        $process = AdministrativeProcess::find($control->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creo la fase de control del proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('processes.index');
    }

    function edit($id){
        $control = Control::find($id);
        return view('processes.control.edit',compact('control'));
    }

    function update(ProcessRequest $request, $id){

        $control = Control::find($id);

        $newControl = $control->update([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);

        $process = AdministrativeProcess::find($control->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se actualizo la fase de control del proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $control = Control::find($request->control_id);
        $control->finish = $request->finish;

        $date_finish = now();
        $control->date_finish = $date_finish;

        $process = AdministrativeProcess::find($control->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se finalizo la fase de control del proyecto : ' . $project->name;
        $activity->save();

        $control->save();

        notify()->success('¡La fase de control fue finalizada!','¡Proceso Exitoso!');
        
        return response()->json(['Aprobado' => 'La fase de control fue finalizada!']);
    }
}
