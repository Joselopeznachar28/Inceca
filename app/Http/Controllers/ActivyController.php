<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivyController extends Controller
{
    public function index(){

        $array = [];
        $activities = Activity::orderBy('id','desc')
        ->simplePaginate(15);;

        foreach ($activities as $key => $activity) {
            $user = User::find($activity->causer_id);
            $objectArray = [
                'username' => $user->username,
                'user' => $user->name . ' ' . $user->lastname,
                'description' =>$activity->description,
                'changes' =>$activity->changes,
                'date' => $activity->created_at->toDateString(),
                'time' => $activity->created_at->toTimeString(),
            ];
            array_push(  $array,$objectArray );
        }

        return view('activities.index',compact('array','activities'));
    }
}
