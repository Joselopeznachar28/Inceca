<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallationRequest;
use App\Models\Area;
use App\Models\Client;
use App\Models\Installacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstallacionController extends Controller
{

    function index(Request $request){

        $search = $request->input('search');

        $installations = Installacion::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);
        
        return view('installations.index',compact('installations','search'));
    }

    function create(Client $client){
        $areas = Area::all();
        return view('installations.create',compact('client','areas'));
    }

    function store(InstallationRequest $request){

        $installation = new Installacion();

        $installation->name = $request->name;
        $installation->description = $request->description;
        $installation->area_id = $request->area_id;
        $installation->client_id = $request->client_id;
        $installation->code = strtoupper( Str::random(3));
        $installation->save();
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('installations.index');
    }

    function edit(Installacion $installation){
        $areas = Area::all();
        return view('installations.edit',compact('installation','areas'));
    }

    function update(InstallationRequest $request, Installacion $installation){
        
        $installation = Installacion::findOrFail($installation->id)->update([
            'name' =>  request('name'),
            'description' =>  request('description'),
            'area_id' =>  request('area_id'),
            'client_id' =>  request('client_id'),
        ]);
        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('installations.index');
    }

    function destroy(Installacion $installation){
        $installation->delete();

        notify()->success('¡El registro ha sido Eliminado exitosamente!','¡Proceso Exitoso!');
        return back() ;
    }
}
