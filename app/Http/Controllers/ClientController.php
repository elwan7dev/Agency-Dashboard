<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Service;

class ClientController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // authintication using middleware
        $this->middleware('auth');
    }

    /**
     * Display a listing of the client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all clients from DB
        $clients = Client::orderBy('created_at', 'DESC')->paginate(10);
        $clientsCount = $clients->count();

       /*  $client = Client::find(9);
        foreach ($client->services as $service) {
            echo $service->pivot->service_id;
        } */

        return \view('client.index', ['clients' => $clients , 'count' => $clientsCount]);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allServices = Service::all();

        $fbServices = Service::orderBy('created_at')->where('type' , 'facebook')->get();
        $twServices = Service::orderBy('created_at')->where('type' , 'twitter')->get();
        $instaServices = Service::orderBy('created_at')->where('type' , 'instagram')->get();
        $tubeServices = Service::orderBy('created_at')->where('type' , 'youtube')->get();
        $othServices = Service::orderBy('created_at')->where('type' , 'other')->get();
                                        
        return \view('client.create' ,  [   
            'allServices' => $allServices ,
            'fbServices' => $fbServices,
            'twServices' => $twServices,
            'instaServices' => $instaServices,
            'tubeServices' => $tubeServices,
            'othServices' => $othServices,
        ]);
    }

    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request , [
            'title' => ['required' , 'string'],
            'desc' => ['required' , 'string'],
            'phone' => 'required',
            'status' => 'required',
            'desc' => 'required',
            'contract_start' => ['required', 'date'],
            'contract_end' => ['required' ,'date', 'after_or_equal:contract_start'],
        ]);

        // create new instance from client model
        $client = new Client();
        $client->title = $request->input('title');
        $client->description = $request->input('desc');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->contract_start = $request->input('contract_start');
        $client->contract_end = $request->input('contract_end');

        $client->save();
        
        // save array of services in povit table service_client
        $client->services()->sync($request->services, false);
        
        return \redirect()->route('clients.index') ->with('success' , 'New Client is Added');
    }

    /**
     * Display the specified client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
       
        if (empty($client)) {
            return \redirect()->route('clients.index')->with('error', 'No Such Id');
        }else {
            // array of client services path to the view
            $clientServices = $client->services;
            return \view('client.show', [
                'client' => $client,
                'clientServices'=> $clientServices
            ]);
        }
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allServices = Service::all();

        $fbServices = Service::orderBy('created_at')->where('type' , 'facebook')->get();
        $twServices = Service::orderBy('created_at')->where('type' , 'twitter')->get();
        $instaServices = Service::orderBy('created_at')->where('type' , 'instagram')->get();
        $tubeServices = Service::orderBy('created_at')->where('type' , 'youtube')->get();
        $othServices = Service::orderBy('created_at')->where('type' , 'other')->get();

        $client = Client::find($id);
       
        if (empty($client)) {
            return \redirect()->route('clients.index')->with('error', 'No Such Id');
        }else {
            // array of client services path to the view
            $clientServices = $client->services;
            return \view('client.edit', [
                'client' => $client,
                'allServices' => $allServices ,
                'fbServices' => $fbServices,
                'twServices' => $twServices,
                'instaServices' => $instaServices,
                'tubeServices' => $tubeServices,
                'othServices' => $othServices,
                'clientServices'=> $clientServices
            ]);
        }
        
    }

    /**
     * Update the specified client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request , [
            'title' => ['required' , 'string'],
            'desc' => ['required' , 'string'],
            'phone' => 'required',
            'status' => 'required',
            'desc' => 'required',
            'contract_start' => ['required', 'date'],
            'contract_end' => ['required' ,'date', 'after_or_equal:contract_start'],

        ]);

        // find post by id
        $client =  Client::find($id);
        $client->title = $request->input('title');
        $client->description = $request->input('desc');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->contract_start = $request->input('contract_start');
        $client->contract_end = $request->input('contract_end');
        $client->save();

        // update specefic client's services in povit table service_client
        $client->services()->sync($request->services);


        return \redirect('/clients')->with('success' , 'Client has been Updated');
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client =  Client::find($id);
        if (! empty($client)){
            $client->delete();
            return \redirect()->route('clients.index')->with('success' , 'Client is Deleted');
        }else
            return \redirect()->route('clients.index')->with('error' , 'There is no such id');
        
    }

}
