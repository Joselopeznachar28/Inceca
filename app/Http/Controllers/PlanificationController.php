<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Planification;
use Illuminate\Http\Request;

class PlanificationController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.planification.create', compact('process'));
    }

    function store(Request $request){
        $planification = Planification::create([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    function edit($id){
        $planification = Planification::find($id);
        return view('processes.planification.edit',compact('planification'));
    }

    function update(Request $request, $id){
        $planification = Planification::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $planification = Planification::find($request->planification_id);
        $planification->finish = $request->finish;
        $planification->save();
        return response()->json(['Aprobado' => 'La fase de planificacion fue finalizada!']);
    }
}
