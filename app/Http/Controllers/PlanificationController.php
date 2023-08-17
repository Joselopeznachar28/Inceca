<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\AdministrativeProcess;
use App\Models\Planification;
use Illuminate\Http\Request;

class PlanificationController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.planification.create', compact('process'));
    }

    function store(ProcessRequest $request){
        $planification = Planification::create([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    function edit($id){
        $planification = Planification::find($id);
        return view('processes.planification.edit',compact('planification'));
    }

    function update(ProcessRequest $request, $id){
        $planification = Planification::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);
        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){

        $planification = Planification::find($request->planification_id);
        $planification->finish = $request->finish;

        $date_finish = now();
        $planification->date_finish = $date_finish;
        
        $process = AdministrativeProcess::find($planification->administrative_process_id);
        $organization = $process->organization;

        $organization->update([
            'date_init' => $date_finish
        ]);

        $organization->fresh();

        $planification->save();
        
        notify()->success('¡La fase de planificacion fue finalizada!','¡Proceso Exitoso!');

        return response()->json(['Aprobado' => 'La fase de planificacion fue finalizada!']);
    }
}
