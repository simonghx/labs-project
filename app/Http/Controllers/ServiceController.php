<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $service = new Service;
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->content = $request->content;

        if($service->save()) {
           return redirect()->route('services.index')->with(["status"=>"success", "message" => 'Votre service a bien été enregistré']);

        } else {
            return redirect()->route('services.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(StoreServiceRequest $request, Service $service)
    {
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->content = $request->content;

        if($service->save()) {

           return redirect()->route('services.index')->with(["status"=>"success", "message" => 'Votre service a bien été modifié']);

        } else {

            return redirect()->route('services.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service->delete()) {
            return redirect()->route('services.index')->with(["status"=>"success", "message" => 'Votre service a bien été supprimé']);

        } else {
            return redirect()->route('services.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }
        
    }
}
