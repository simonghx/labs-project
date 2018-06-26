<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('admin.testimoniaux.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        $testimonial = new Testimonial;
        $testimonial->content = $request->content;
        $testimonial->client_id = $request->client_id;

        if($testimonial->save()) {
            return redirect()->route('clients.index')->with(['message' => 'Votre testimonial a bien été ajouté au client.', 'status' => 'success']);
        } else {
            return redirect()->route('testimoniaux.create')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($testimonial)
    {
        $clients = Client::all();
        $testimonial = Testimonial::find($testimonial);
        return view('admin.testimoniaux.edit', compact('testimonial', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->content = $request->content;
        $testimonial->client_id = $request->client_id;

        if($testimonial->save()) {
            return redirect()->route('clients.index')->with(['message' => 'Votre testimonial a bien été modifié.', 'status' => 'success']);
        } else {
            return redirect()->route('testimoniaux.create')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if($testimonial->delete()) {
            return redirect()->route('clients.index')->with(['message' => 'Votre testimonial a bien été supprimé.', 'status' => 'success']);
        } else {
            return redirect()->route('clients.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }
}
