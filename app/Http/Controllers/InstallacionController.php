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

    function index(){
        $installations = Installacion::all();
        return view('installations.index',compact('installations'));
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

        return redirect()->route('installations.index');
    }

    function destroy(Installacion $installation){
        $installation->delete();
        return back() ;
    }
}
