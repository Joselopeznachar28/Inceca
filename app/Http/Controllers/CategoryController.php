<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    function create(){
        return view('categories.create');
    }

    function store(Request $request){

        $categorie = new Category();

        $categorie->name = $request->name;
        $categorie->code = strtoupper( Str::random(3));
        $categorie->save();

        return redirect()->route('categories.index');
    }

    function edit(Category $category){
        return view('categories.edit',compact('category'));
    }

    function update(Request $request, Category $category){
        
        $category = Category::findOrFail($category->id)->update([
            'name' =>  request('name'),
        ]);

        return redirect()->route('categories.index');
    }

    function destroy(Category $category){
        $category->delete();
        return back() ;
    }
}
