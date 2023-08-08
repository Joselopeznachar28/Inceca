<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Categorias
Route::get('Categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('Crear/Categoria', [CategoryController::class, 'create'])->name('categories.create');
Route::post('Categoria', [CategoryController::class, 'store'])->name('categories.store');
Route::get('Editar/Categoria/{category:name}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('Editar/Categoria/{category:name}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('Categoria/{category:name}', [CategoryController::class, 'destroy'])->name('categories.destroy');
