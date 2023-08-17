<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    function index(Request $request){

        $search = $request->input('search');

        $clients = Client::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('company', 'LIKE', '%'.$search.'%')
            ->orWhere('identification', 'LIKE', '%'.$search.'%')
            ->orWhere('address', 'LIKE', '%'.$search.'%')
            ->orWhere('phone', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')
            ->orWhere('country', 'LIKE', '%'.$search.'%')
            ->orWhere('city', 'LIKE', '%'.$search.'%')
            ->orWhere('state', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(10);

        return view('clients.index',compact('clients','search'));
    }

    function create(){
        $categories = Category::all();
        return view('clients.create',compact('categories'));
    }

    function store(ClientRequest $request){

        $client = new Client();

        $client->name = $request->name;
        $client->company = $request->company;
        $client->identification = $request->identification;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->country = $request->country;
        $client->category_id = $request->category_id;
        $client->state = $request->state;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->save();
        notify()->success('¡El registro se ha guardado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('clients.index');
    }

    function edit(Client $client){
        $categories = Category::all();
        return view('clients.edit',compact('client','categories'));
    }

    function update(ClientRequest $request, Client $client){
        
        $client = Client::findOrFail($client->id)->update([
            'name' =>  request('name'),
            'company' =>  request('company'),
            'identification' =>  request('identification'),
            'phone' =>  request('phone'),
            'email' =>  request('email'),
            'country' =>  request('country'),
            'category_id' =>  request('category_id'),
            'state' =>  request('state'),
            'city' =>  request('city'),
            'address' =>  request('address'),
        ]);
        notify()->success('¡El registro se ha actualizado exitosamente!','¡Proceso Exitoso!');
        return redirect()->route('clients.index');
    }

    function destroy(Client $client){
        $client->delete();
        notify()->success('¡El registro ha sido Eliminado exitosamente!','¡Proceso Exitoso!');
        return back() ;
    }
}
