<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
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
     * Display a listing of the service.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allServices = Service::all();

        $fbServices = Service::orderBy('created_at')->where('type' , 'facebook')->get();
        $twServices = Service::orderBy('created_at')->where('type' , 'twitter')->get();
        $instaServices = Service::orderBy('created_at')->where('type' , 'instagram')->get();
        $tubeServices = Service::orderBy('created_at')->where('type' , 'youtube')->get();
        $othServices = Service::orderBy('created_at')->where('type' , 'other')->get();
                                        
        $count = count($allServices);
        return \view('service.index' ,  [   
            'allServices' => $allServices ,
            'fbServices' => $fbServices,
            'twServices' => $twServices,
            'instaServices' => $instaServices,
            'tubeServices' => $tubeServices,
            'othServices' => $othServices,
            'count' => $count
            ]);
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('service.create');
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'title' => 'required | string',
            'type' => 'required | string',
            'desc' => 'required | min:20'
        ]);

        // create new service instance
        $service = new Service();
        $service->title = $request->input('title');
        $service->type = $request->input('type');
        $service->description = $request->input('desc');

        $service->save();
        return \redirect("/services")->with('success' , 'New Service is Added');
    }

    /**
     * Display the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        if (empty($service))
            return \redirect()->route('services.index')->with('error' , 'No Such Id');
        else
            return \view('service.edit' , ['service' => $service]);
            
    }

    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validation
         $this->validate($request, [
            'title' => 'required | string',
            'type' => 'required | string',
            'desc' => 'required | min:20'
        ]);
        // find service by id
        $service =  Service::find($id);
        $service->title = $request->input('title');
        $service->type = $request->input('type');
        $service->description = $request->input('desc');

        $service->save();
        return \redirect()->route('services.index')->with('success' , 'Service has been updated');
    }

    /**
     * Remove the specified service from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service =  Service::find($id);
        if (! empty($service)){
            $service->delete();
            return \redirect()->route('services.index')->with('success' , 'Service is Deleted');
        }else
            return \redirect()->route('services.index')->with('error' , 'There is no such id');
    }
}
