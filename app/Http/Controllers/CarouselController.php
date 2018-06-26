<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarouselRequest;
use Image;
use Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all()->sortByDesc('created_at');
        return view('admin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarouselRequest $request)
    {
        $carousel = new Carousel;
        $carousel->name = $request->name;

        // Storage::disk('editeurs')->delete($imageName);
        $carousel->image = $request->image->store('', 'carousel');

        if($carousel->save()) {
            return redirect()->route('carousel.index')->with(["status"=>"success", "message" => 'Votre image a bien été ajoutée au carousel.']);

        } else {
            return redirect()->route('carousel.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCarouselRequest $request, Carousel $carousel)
    {
        $carousel->name = $request->name;

        Storage::disk('carousel')->delete($carousel->image);
        $carousel->image = $request->image->store('', 'carousel');

        if($carousel->save()) {
            return redirect()->route('carousel.index')->with(["status"=>"success", "message" => 'Votre image a bien été modifiée.']);

        } else {
            return redirect()->route('carousel.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        if($carousel->delete()) {
            Storage::disk('carousel')->delete($carousel->image);
            return redirect()->route('carousel.index')->with(["status"=>"success", "message" => 'Votre image a bien été supprimée.']);

        } else {
            return redirect()->route('carousel.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard.']);
        }
    }
}
