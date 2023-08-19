<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class CategoryController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $categories = Category::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);
        return view('categories.index',compact('categories','search'));
    }

    function create(){
        return view('categories.create');
    }

    function store(CategoryRequest $request){

        $categorie = new Category();

        $categorie->name = $request->name;
        $categorie->code = strtoupper( Str::random(3));
        $categorie->save();

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creó la Categoria : ' . $categorie->name;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('categories.index');
    }

    function edit(Category $category){
        return view('categories.edit',compact('category'));
    }

    function update(CategoryRequest $request, Category $category){
        
        $newCategory = Category::findOrFail($category->id)->update([
            'name' =>  request('name'),
        ]);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se actualizo la Categoria : ' . $category->name;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('categories.index');
    }

    function destroy(Category $category){

        $category->delete();

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se elimino la Categoria : ' . $category->name;
        $activity->save();

        notify()->success('¡El registro ha sido eliminado exitosamente!','¡Proceso Exitoso!');

        return back() ;
    }
}
