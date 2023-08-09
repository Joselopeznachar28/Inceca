<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Installacion;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    function index(){
        $projects = Project::all();
        return view('projects.index',compact('projects'));
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

        return redirect()->route('projects.index');
    }

    function edit(Project $project){
        return view('projects.edit',compact('project'));
    }

    function update(ProjectRequest $request, Project $project){
        
        $project = Project::findOrFail($project->id)->update([
            'name' =>  request('name'),
            'description' =>  request('description'),
            'installation_id' =>  request('installation_id'),
        ]);

        return redirect()->route('projects.index');
    }

    function show(Project $project){
        return view('projects.show',compact('project'));
    }

    function destroy(Project $project){
        $project->delete();
        return back() ;
    }
}
