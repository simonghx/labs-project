<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Article;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Categorie::all();
        
        // return view('admin.catandtags.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = new Categorie;
        $categorie->name = $request->name;

        if($categorie->save()){
            return redirect()->route('catandtags')->with(['message' => 'Votre catégorie a bien été crée.', 'status' => 'success']);
        } else {
            return redirect()->route('catandtags')->with(['message' => 'Un problème est survenu, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        $this->authorize('edit', $categorie);
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        $categorie->name = $request->name;
        
        if($categorie->save()){
            return redirect()->route('catandtags')->with(['message' => 'Votre catégorie a bien été modifiée.', 'status' => 'success']);
        } else {
            return redirect()->route('catandtags')->with(['message' => 'Un problème est survenu, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $this->authorize('delete', $categorie);
        if($categorie->delete()) {
            foreach($categorie->articles as $article){
                $article->delete();
            }
            return redirect()->route('catandtags')->with(['message' => 'Votre catégorie a bien été supprimée.', 'status' => 'success']);
        } else {
            return redirect()->route('catandtags')->with(['message' => 'Un problème est survenu, veuillez réessayer plus tard.', 'status' => 'danger']);
        }
    }
}
