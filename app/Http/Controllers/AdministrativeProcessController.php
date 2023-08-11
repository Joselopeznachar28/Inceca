<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdministrativeProcessController extends Controller
{
    function index(){
        $processes = AdministrativeProcess::all();
        return view('processes.index',compact('processes'));
    }

    /*function create(Project $project){
        return view('processes.create',compact('project'));
    }*/

    function store(Request $request){
        
        $process = AdministrativeProcess::create([
            "project_id" => $request->project_id,
            "code" => strtoupper( Str::random(3)),
        ]);

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
        return view('processes.show',compact('process'));
    }

    function destroy(AdministrativeProcess $process){
        $process->delete();
        return back() ;
    }
}
