<?php

namespace App\Http\Controllers;

use App\Client;
use App\Service;
use Illuminate\Http\Request;

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
        $clients = Client::latest()->paginate(10);

        /*  $client = Client::find(9);
        foreach ($client->services as $service) {
        echo $service->pivot->service_id;
        } */
        return \view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allServices = Service::all();

        $fbServices = Service::orderBy('created_at')->where('type', 'facebook')->get();
        $twServices = Service::orderBy('created_at')->where('type', 'twitter')->get();
        $instaServices = Service::orderBy('created_at')->where('type', 'instagram')->get();
        $tubeServices = Service::orderBy('created_at')->where('type', 'youtube')->get();
        $othServices = Service::orderBy('created_at')->where('type', 'other')->get();

        return \view('client.create', [
            'allServices' => $allServices,
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
    public function store()
    {
        // validatiedAtrr array
        // $validatedAttributes  = $this->validateClient();
        // mass assignments
        $client = Client::create($this->validateClient());

        /*  // create new instance from client model
        $client = new Client();
        $client->title = $request->input('title');
        $client->descriptionription = $request->input('description');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->contract_start = $request->input('contract_start');
        $client->contract_end = $request->input('contract_end');

        $client->save(); */

        // save array of services in povit table service_client
        $client->services()->sync(request()->services, false);

        return \redirect()->route('clients.index')->with('success', "<b>$client->title</b> profile is created");
    }

    /**
     * Display the specified client.
     * @param  Client $client - laverage route model binding
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // array of client services path to the view
        $clientServices = $client->services;
        return \view('client.show', [
            'client' => $client,
            'clientServices' => $clientServices,
        ]);
    }

    /**
     * Show the form for editing the specified client.
     * @param  Client $client - laverage route model binding
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $allServices = Service::all();
        $fbServices = Service::orderBy('created_at')->where('type', 'facebook')->get();
        $twServices = Service::orderBy('created_at')->where('type', 'twitter')->get();
        $instaServices = Service::orderBy('created_at')->where('type', 'instagram')->get();
        $tubeServices = Service::orderBy('created_at')->where('type', 'youtube')->get();
        $othServices = Service::orderBy('created_at')->where('type', 'other')->get();

        // array of client services path to the view
        $clientServices = $client->services;
        return \view('client.edit', [
            'client' => $client,
            'allServices' => $allServices,
            'fbServices' => $fbServices,
            'twServices' => $twServices,
            'instaServices' => $instaServices,
            'tubeServices' => $tubeServices,
            'othServices' => $othServices,
            'clientServices' => $clientServices,
        ]);
    }

    /**
     * Update the specified client in storage.
     * @param  Client $client - laverage route model binding
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client)
    {
        // validatiedAtrr array
        // $validatedAttributes  = $this->validateClient();
        // mass assignments
        $client->update($this->validateClient());
        // update specefic client's services in povit table service_client
        // $client->services()->sync($request->services);
        $client->services()->sync(request()->services);
        return \redirect()->route('clients.index')->with('success', "<b>$client->title</b> profile has been Updated");
    }

    /**
     * Remove the specified client from storage.
     * @param  Client $client - laverage route model binding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return \redirect()->route('clients.index')->with('error', "<b>$client->title</b> Profile is deleted");
    }

    /**
     * validateClient method v1.0
     * @return validatedAtrr[]
     */
    public function validateClient()
    {
        return request()->validate([
            'title' => 'required | string',
            'description' => 'required | string | min:5',
            'phone' => 'required',
            'status' => 'required',
            'description' => 'required',
            'contract_start' => 'required | date',
            'contract_end' => 'required | date | after_or_equal:contract_start',
        ]);
    }

}
