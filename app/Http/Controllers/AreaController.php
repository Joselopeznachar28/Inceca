<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    function index(){
        $areas = Area::all();
        return view('areas.index',compact('areas'));
    }

    function create(){
        return view('areas.create');
    }

    function store(AreaRequest $request){

        $area = new Area();

        $area->name = $request->name;
        $area->state = $request->state;
        $area->city = $request->city;
        $area->address = $request->address;
        $area->code = strtoupper( Str::random(3));
        $area->save();

        return redirect()->route('areas.index');
    }

    function edit(Area $area){
        return view('areas.edit',compact('area'));
    }

    function update(AreaRequest $request, Area $area){
        
        $area = Area::findOrFail($area->id)->update([
            'name' =>  request('name'),
            'state' =>  request('state'),
            'city' =>  request('city'),
            'address' =>  request('address'),
        ]);

        return redirect()->route('areas.index');
    }

    function destroy(Area $area){
        $area->delete();
        return back() ;
    }
}
