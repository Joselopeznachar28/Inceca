<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeProcess;
use App\Models\Announcement;
use App\Models\Area;
use App\Models\Category;
use App\Models\Client;
use App\Models\Installacion;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $areas = Area::latest()->take(5)->get();
        $countAreas = count(Area::all());
        $categories = Category::latest()->take(5)->get();
        $countCategories = count(Category::all());
        $clients = Client::latest()->take(5)->get();
        $countClients = count(Client::all());
        $installations = Installacion::latest()->take(5)->get();
        $countInstallations = count(Installacion::all());
        $projects = Project::latest()->take(5)->get();
        $countProjects = count(Project::all());
        // $process = AdministrativeProcess::all();
        $announcements = Announcement::latest()->take(5)->get();
        $countAnnouncements = count(Announcement::all());

        $arrayData = [
            [
                'name' => 'Areas',
                'cant' => $countAreas,
            ],
            [
                'name' => 'Categorias',
                'cant' => $countCategories,
            ],
            [
                'name' => 'Clientes',
                'cant' => $countClients,
            ],
            [
                'name' => 'Instalaciones',
                'cant' => $countInstallations,
            ],
            [
                'name' => 'Proyectos',
                'cant' => $countProjects,
            ],
            [
                'name' => 'Anuncios',
                'cant' => $countAnnouncements,
            ],
        ];

        return view('home',compact('arrayData','areas','categories','clients','installations','projects','announcements'));
    }
}
