<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    function create($id){
        $process = AdministrativeProcess::find($id);
        return view('processes.direction.create', compact('process'));
    }

    function store(Request $request){
        $process = Direction::create([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    function edit($id){
        $direction = Direction::find($id);
        return view('processes.direction.edit',compact('direction'));
    }

    function update(Request $request, $id){
        $direction = Direction::findOrFail($id)->update([
            'administrative_process_id' => $request->administrative_process_id,
            'date_init' => $request->date_init,
            'description' => $request->description,
        ]);

        return redirect()->route('processes.index');
    }

    public function changeFinishStatus(Request $request){
        $direction = Direction::find($request->direction_id);
        $direction->finish = $request->finish;
        $direction->save();
        return response()->json(['Aprobado' => 'La fase de direccion fue finalizada!']);
    }
}
