<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Organization;
use App\Models\Planification;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.organization.create', compact('process'));
    }

    function store(Request $request){
        $organization = Organization::create([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    function edit($id){
        $organization = Organization::find($id);
        return view('processes.organization.edit',compact('organization'));
    }

    function update(Request $request, $id){
        $organization = Organization::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $organization = Organization::find($request->organization_id);
        $organization->finish = $request->finish;
        $organization->save();
        return response()->json(['Aprobado' => 'La fase de organizacion fue finalizada!']);
    }
}
