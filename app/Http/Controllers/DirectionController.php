<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\AdministrativeProcess;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.direction.create', compact('process'));
    }

    function store(ProcessRequest $request){
        $process = Direction::create([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    function edit($id){
        $direction = Direction::find($id);
        return view('processes.direction.edit',compact('direction'));
    }

    function update(ProcessRequest $request, $id){
        $direction = Direction::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'description' => $request->description,
        ]);
        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $direction = Direction::find($request->direction_id);
        $direction->finish = $request->finish;

        $date_finish = now();
        $direction->date_finish = $date_finish;

        $process = AdministrativeProcess::find($direction->administrative_process_id);
        $control = $process->control;

        $control->update([
            'date_init' => $date_finish
        ]);

        $control->fresh();

        $direction->save();

        notify()->success('¡La fase de direccion fue finalizada!','¡Proceso Exitoso!');
        
        return response()->json(['Aprobado' => 'La fase de direccion fue finalizada!']);
    }
}
