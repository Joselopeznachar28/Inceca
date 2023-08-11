<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    function index(){
        $announcements = Announcement::all();
        return view('announcements.index',compact('announcements'));
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

        return redirect()->route('announcements.index');
    }

    function edit(Announcement $announcement){
        return view('announcements.edit',compact('announcement'));
    }

    function update(AnnouncementRequest $request, Announcement $announcement){
        
        $announcement = Announcement::findOrFail($announcement->id)->update([
            'name' =>  request('name'),
            'description' =>  request('description'),
            'date' =>  request('date'),
            'project_id' =>  request('project_id'),
        ]);

        return redirect()->route('announcements.index');
    }

    function show(Announcement $announcement){
        return view('announcements.show',compact('announcement'));
    }

    function destroy(Announcement $announcement){
        $announcement->delete();
        return back() ;
    }
}
