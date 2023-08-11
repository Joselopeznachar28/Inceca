<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.control.create', compact('process'));
    }

    function store(Request $request){
        $process = Control::create([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    function edit($id){
        $control = Control::find($id);
        return view('processes.control.edit',compact('control'));
    }

    function update(Request $request, $id){
        $control = Control::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $control = Control::find($request->control_id);
        $control->finish = $request->finish;
        $control->save();
        return response()->json(['Aprobado' => 'La fase de control fue finalizada!']);
    }
}
