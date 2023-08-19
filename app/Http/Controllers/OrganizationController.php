<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\AdministrativeProcess;
use App\Models\Organization;
use App\Models\Planification;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class OrganizationController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.organization.create', compact('process'));
    }

    function store(ProcessRequest $request){

        $organization = Organization::create([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);

        $process = AdministrativeProcess::find($organization->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creo la fase de organizacion del proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    function edit($id){
        $organization = Organization::find($id);
        return view('processes.organization.edit',compact('organization'));
    }

    function update(ProcessRequest $request, $id){
        $organization = Organization::find($id);
        $newOrganization = $organization->update([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);

        $process = AdministrativeProcess::find($organization->administrative_process_id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creo la fase de organizacion del proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){

        $organization = Organization::find($request->organization_id);
        $organization->finish = $request->finish;

        $date_finish = now();
        $organization->date_finish = $date_finish;

        $process = AdministrativeProcess::find($organization->administrative_process_id);
        $direction = $process->direction;

        $direction->update([
            'date_init' => $date_finish
        ]);

        $direction->fresh();

        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se finalizo la fase de organizacion del proyecto : ' . $project->name;
        $activity->save();

        $organization->save();
        notify()->success('¡La fase de organizacion fue finalizada!','¡Proceso Exitoso!');
        
        return response()->json(['Aprobado' => 'La fase de organizacion fue finalizada!']);
    }
}
