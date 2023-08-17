<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('categories.index');
    }

    function edit(Category $category){
        return view('categories.edit',compact('category'));
    }

    function update(CategoryRequest $request, Category $category){
        
        $category = Category::findOrFail($category->id)->update([
            'name' =>  request('name'),
        ]);

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('categories.index');
    }

    function destroy(Category $category){
        $category->delete();
        notify()->success('¡El registro ha sido eliminado exitosamente!','¡Proceso Exitoso!');

        return back() ;
    }
}
