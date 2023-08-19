<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class AdministrativeProcessController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $processes = AdministrativeProcess::when($search, function ($query, $search) {
            $query->orWhere('code', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);

        return view('processes.index',compact('processes','search'));
    }

    /*function create(Project $project){
        return view('processes.create',compact('project'));
    }*/

    function store(Request $request){
        
        $process = AdministrativeProcess::create([
            "project_id" => $request->project_id,
            "code" => strtoupper( Str::random(3)),
        ]);

        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se genero el Processo Administrativo del Proyecto : ' . $project->name;
        $activity->save();

        return redirect()->route('processes.index');
    }

    /*function edit(AdministrativeProcess $process){
        return view('processes.edit',compact('process'));
    }

      function update(Request $request, AdministrativeProcess $process){
        
        $process = AdministrativeProcess::findOrFail($process->id)->update([
            'project_id' =>  request('project_id'),
            'planification' =>  request('planification'),
            'organization' =>  request('organization'),
            'direction' =>  request('direction'),
            'control' =>  request('control'),
        ]);

        return redirect()->route('processes.index');
    }*/

    function show($id){

        $process = AdministrativeProcess::find($id);
        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Observo los detalles del Proceso Administrativo del proyecto : ' . $project->name;
        $activity->save();

        return view('processes.show',compact('process'));
    }

    function destroy(AdministrativeProcess $process){

        $project = Project::find($process->project_id);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se elimino el Processo Administrativo del Proyecto : ' . $project->name;
        $activity->save();
        
        $process->delete();


        return back() ;
    }
}
