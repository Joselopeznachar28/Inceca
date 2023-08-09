<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InstallacionController;
use App\Http\Controllers\ProjectController;
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

//Categories
Route::get('Categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('Crear/Categoria', [CategoryController::class, 'create'])->name('categories.create');
Route::post('Categoria', [CategoryController::class, 'store'])->name('categories.store');
Route::get('Editar/Categoria/{category:name}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('Editar/Categoria/{category:name}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('Categoria/{category:name}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//Areas
Route::get('Areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('Crear/Area', [AreaController::class, 'create'])->name('areas.create');
Route::post('Area', [AreaController::class, 'store'])->name('areas.store');
Route::get('Editar/Area/{area:name}', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('Editar/Area/{area:name}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('Area/{area:name}', [AreaController::class, 'destroy'])->name('areas.destroy');

//Clients
Route::get('Clientes', [ClientController::class, 'index'])->name('clients.index');
Route::get('Crear/Client', [ClientController::class, 'create'])->name('clients.create');
Route::post('Client', [ClientController::class, 'store'])->name('clients.store');
Route::get('Editar/Client/{client:name}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('Editar/Client/{client:name}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('Client/{client:name}', [ClientController::class, 'destroy'])->name('clients.destroy');

//Installations
Route::get('Instalaciones', [InstallacionController::class, 'index'])->name('installations.index');
Route::get('Crear/Instalacion/Compañia{client:company}', [InstallacionController::class, 'create'])->name('installations.create');
Route::post('Instalacion', [InstallacionController::class, 'store'])->name('installations.store');
Route::get('Editar/Instalacion/{installation:name}', [InstallacionController::class, 'edit'])->name('installations.edit');
Route::put('Editar/Instalacion/{installation:name}', [InstallacionController::class, 'update'])->name('installations.update');
Route::delete('Instalacion/{installation:name}', [InstallacionController::class, 'destroy'])->name('installations.destroy');

//Projects
Route::get('Proyectos', [ProjectController::class, 'index'])->name('projects.index');
Route::get('Crear/Proyecto/Instalacion/{installation:name}', [ProjectController::class, 'create'])->name('projects.create');
Route::post('Proyecto', [ProjectController::class, 'store'])->name('projects.store');
Route::get('Editar/Proyecto/{project:name}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('Editar/Proyecto/{project:name}', [ProjectController::class, 'update'])->name('projects.update');
Route::get('Detalles/Proyecto/{project:name}', [ProjectController::class, 'show'])->name('projects.show');
Route::delete('Proyecto/{project:name}', [ProjectController::class, 'destroy'])->name('projects.destroy');

//announcement
Route::get('Anuncios', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('Crear/Anuncio/Proyecto/{project:name}', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::post('Anuncio', [AnnouncementController::class, 'store'])->name('announcements.store');
Route::get('Editar/Anuncio/{announcement:name}', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::put('Editar/Anuncio/{announcement:name}', [AnnouncementController::class, 'update'])->name('announcements.update');
Route::get('Detalles/Anuncio/{announcement:name}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::delete('Anuncio/{announcement:name}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
