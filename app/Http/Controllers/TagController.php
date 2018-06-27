<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;

        if($tag->save()){
            return redirect()->route('catandtags')->with(['message' => 'Votre tag a bien été créé.', 'status' => 'success']);
        } else {
            return redirect()->route('catandtags')->with(['message' => 'Un problème est survenu, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $this->authorize('view', $tag);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        
        if($tag->save()){
            return redirect()->route('catandtags')->with(['message' => 'Votre tag a bien été modifié.', 'status' => 'success']);
        } else {
            return redirect()->route('catandtags')->with(['message' => 'Un problème est survenu, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $this->authorize('delete', $tag);
        if($tag->delete()) {
            return redirect()->route('catandtags')->with(['message' => 'Votre tag a bien été supprimé.', 'status' => 'success']);
        } else {
            return redirect()->route('catandtags')->with(['message' => 'Un problème est survenu, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }
}
