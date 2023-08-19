<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('lastname', 'LIKE', '%'.$search.'%')
            ->orWhere('identification', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')
            ->orWhere('username', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);
        
        return view('users.index',compact('users','search'));
    }

    function create(){
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    function store(UserRequest $request){

        
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'identification' => $request->identification,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'code' => strtoupper( Str::random(3)),
        ]);
        
        $roles = $request->role_id;
        
        if (!empty($roles)) {
            $user->roles()->sync($roles);
        }
        
        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se creó el Usuario : ' . $user->name . ' ' . $user->lastname;
        $activity->save();

        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');

        return redirect()->route('users.index');
    }

    function edit(User $user){
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    function update(UserRequest $request, User $user){

        $oldUser = User::find($user->id);

        $newUser = $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'identification' => $request->identification,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $roles = $request->role_id;

        if (!empty($roles)) {
            $user->roles()->sync($roles);
        }

        // $prueba = [
        //     'oldUser' => $oldUser,
        //     'newUser' => User::find($user->id)
        // ];

        // dd($prueba);

        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se Actualizaron los datos del usuario : ' . $oldUser->name . ' ' . $oldUser->lastname;
        $activity->save();

        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('users.index');
    }

    function show(User $user){
        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Observo los detalles del usuario : ' . $user->name . ' ' . $user->lastname;
        $activity->save();
        return view('users.show',compact('user'));
    }

    function destroy(User $user){
        $user->delete();
        $activity = new Activity();
        $activity->created_at = now();
        $activity->causer_id = Auth::user()->id;
        $activity->description = 'Se Elimino el usuario : ' . $user->name . ' ' . $user->lastname;
        $activity->save();
        notify()->success('¡El registro ha sido Eliminado exitosamente!','¡Proceso Exitoso!');
        return back() ;
    }

}
