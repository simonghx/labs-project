<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Storage;
use Image;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        if($content->titre != null) {
            return view('admin.contents.editTitre', compact('content'));
        } else if($content->texte != null) {
            return view('admin.contents.editTexte', compact('content'));
        } else {
            return view('admin.contents.editImage', compact('content'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        if($request->titre) {
            $content->titre = $request->titre;
        } else if($request->texte){
            $content->texte = $request->texte;
        } else {
            
            Storage::disk('content')->delete($content->image);
            $content->image = $request->image->store('', 'content');

        }
        
        if($content->save()){
            return redirect()->route('contents.index')->with(['message' => 'Votre contenu a bien été modifié.', 'status' => 'success']);
        } else {
            return redirect()->route('contents.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
