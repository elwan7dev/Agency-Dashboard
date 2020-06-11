<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all clients from DB
        $clients = Client::orderBy('created_at', 'DESC')->get();
        $clientsCount = $clients->count();
        return \view('client.index', ['clients' => $clients , 'count' => $clientsCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('client.create');   
    }

    /**
     * Store a newly created resource in storage.
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
            'desc' => 'required',
            'contract-start' => ['required', 'date'],
            'contract-end' => ['required' ,'date', 'after_or_equal:contract-start'],

        ]);

        // create new instance from client model
        $client = new Client();
        $client->title = $request->input('title');
        $client->description = $request->input('desc');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->contract_start = $request->input('contract-start');
        $client->contract_end = $request->input('contract-end');

        $client->save();
        return \redirect("/clients")->with('success' , 'New Client is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        if (!empty($client)) {
        }else {
            return \redirect('/clients')->with('error', 'No Such Id');
        }
        return \view('client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
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
            'desc' => 'required',
            'contract-start' => ['required', 'date'],
            'contract-end' => ['required' ,'date', 'after_or_equal:contract-start'],

        ]);

        // find post by id
        $client =  Client::find($id);
        $client->title = $request->input('title');
        $client->description = $request->input('desc');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->contract_start = $request->input('contract-start');
        $client->contract_end = $request->input('contract-end');
        $client->save();

        return \redirect('/clients')->with('success' , 'Client has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return \redirect('/clients')->with('success' , 'Client is Deleted');
    }
}
