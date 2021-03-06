<?php

namespace App\Http\Controllers;

use App\Client;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Services\ImageResize;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    public function __construct(ImageResize  $imageResize){
        $this->imageResize = $imageResize;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('testimonials')->paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->poste = $request->poste;

        if ($request->photo != null) {    
            $argImg = [
                'request' => $request->photo,
                'disk1' => 'clients',
                'disk2' => 'clientsMini',
                'x' => 60,
                'y' => 60,
            ];

            $client->photo = $this->imageResize->imageStore($argImg);

        }

        if($client->save()){
            return redirect()->route('clients.index')->with(['message' => 'Votre client a bien été ajouté.', 'status' => 'success']);
        } else {
            return redirect()->route('clients.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, Client $client)
    {
        $client->name = $request->name;
        $client->poste = $request->poste;

        if ($request->photo != null) {    
            $argImg = [
                'request' => $request->photo,
                'disk1' => 'clients',
                'disk2' => 'clientsMini',
                'x' => 60,
                'y' => 60,
            ];

            $this->imageResize->imageDelete($client->photo); 
            $client->photo = $this->imageResize->imageStore($argImg);

        }

        if($client->save()){
            return redirect()->route('clients.index')->with(['message' => 'Votre client a bien été modifié.', 'status' => 'success']);
        } else {
            return redirect()->route('clients.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client->delete()){
            if ($client->photo != null) { 
                $this->imageResize->imageDelete($client->photo); 
            }
            
            foreach($client->testimonials as $testimonial) {
                $testimonial->delete();
            }
            return redirect()->route('clients.index')->with(['message' => 'Votre client a bien été supprimé.', 'status' => 'success']);
        } else {
            return redirect()->route('clients.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }
}
