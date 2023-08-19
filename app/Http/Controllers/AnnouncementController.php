<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class AnnouncementController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $announcements = Announcement::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('date', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);

        return view('announcements.index',compact('announcements','search'));
    }

    function create(Project $project){
        return view('announcements.create',compact('project'));
    }

    function store(AnnouncementRequest $request){
        
        $announcement = new Announcement();

        $announcement->name = $request->name;
        $announcement->project_id = $request->project_id;
        $announcement->description = $request->description;
        $announcement->date = $request->date;
        $announcement->code = strtoupper( Str::random(3));
        $announcement->save();

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creo el anuncio : ' . $announcement->name;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('announcements.index');
    }

    function edit(Announcement $announcement){
        return view('announcements.edit',compact('announcement'));
    }

    function update(AnnouncementRequest $request, Announcement $announcement){
        
        $newAnnouncement = Announcement::findOrFail($announcement->id)->update([
            'name' =>  request('name'),
            'description' =>  request('description'),
            'date' =>  request('date'),
            'project_id' =>  request('project_id'),
        ]);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se actualizo el anuncio : ' . $announcement->name;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('announcements.index');
    }

    function show(Announcement $announcement){

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se observaron los detalles del anuncio : ' . $announcement->name;
        $activity->save();

        return view('announcements.show',compact('announcement'));
    }

    function destroy(Announcement $announcement){

        $announcement->delete();

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se elimino el anuncio : ' . $announcement->name;
        $activity->save();

        notify()->success('¡El registro ha sido Eliminado exitosamente!','¡Proceso Exitoso!');
        
        return back() ;
    }
}
