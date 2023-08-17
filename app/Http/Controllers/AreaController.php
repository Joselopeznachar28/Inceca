<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $areas = Area::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('state', 'LIKE', '%'.$search.'%')
            ->orWhere('city', 'LIKE', '%'.$search.'%')
            ->orWhere('address', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);

        return view('areas.index',compact('areas','search'));
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
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
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

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('areas.index');
    }

    function destroy(Area $area){
        
        $area->delete();
        notify()->success('¡El registro ha sido Eliminado exitosamente!','¡Proceso Exitoso!');
        return back() ;
    }
}
