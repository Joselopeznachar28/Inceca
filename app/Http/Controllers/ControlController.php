<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\AdministrativeProcess;
use App\Models\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.control.create', compact('process'));
    }

    function store(ProcessRequest $request){
        $process = Control::create([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('processes.index');
    }

    function edit($id){
        $control = Control::find($id);
        return view('processes.control.edit',compact('control'));
    }

    function update(ProcessRequest $request, $id){
        $control = Control::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);
        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $control = Control::find($request->control_id);
        $control->finish = $request->finish;

        $date_finish = now();
        $control->date_finish = $date_finish;

        $control->save();

        notify()->success('¡La fase de control fue finalizada!','¡Proceso Exitoso!');
        
        return response()->json(['Aprobado' => 'La fase de control fue finalizada!']);
    }
}
