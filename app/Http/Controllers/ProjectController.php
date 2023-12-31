<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Installacion;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
use Spatie\Activitylog\Models\Activity;

class ProjectController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $projects = Project::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);

        return view('projects.index',compact('projects','search'));
    }

    function create(Installacion $installation){
        return view('projects.create',compact('installation'));
    }

    function store(ProjectRequest $request){
        
        $project = new Project();

        $project->name = $request->name;
        $project->installation_id = $request->installation_id;
        $project->description = $request->description;
        $project->code = strtoupper( Str::random(3));
        $project->save();

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creo el Proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('projects.index');
    }

    function edit(Project $project){
        $installation = Installacion::find($project->installation_id);
        return view('projects.edit',compact('project','installation'));
    }

    function update(ProjectRequest $request, Project $project){
        
        $newProject = Project::findOrFail($project->id)->update([
            'name' =>  request('name'),
            'description' =>  request('description'),
            'installation_id' =>  request('installation_id'),
        ]);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se actualizo el Proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('projects.index');
    }

    function pdf(Project $project){
        $installation = Installacion::find($project->installation_id);
        $pdf = PDF::loadView('projects.pdf', compact('installation','project'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }

    function destroy(Project $project){

        $project->delete();

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se elimino el Proyecto : ' . $project->name;
        $activity->save();

        notify()->success('¡El registro ha sido Eliminado exitosamente!','¡Proceso Exitoso!');
        return back() ;
    }
}
