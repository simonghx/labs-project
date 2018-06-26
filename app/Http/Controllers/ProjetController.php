<?php

namespace App\Http\Controllers;

use App\Projet;
use Illuminate\Http\Request;
use App\Services\ImageResize;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProjetRequest;

class ProjetController extends Controller
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
        $projets = Projet::all()->sortByDesc('created_at');
        return view('admin.projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons = DB::table('icons')->paginate(10);
        return view('admin.projets.create', compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjetRequest $request)
    {
        $projet = new Projet;
        $projet->titre = $request->titre;
        $projet->icon = $request->icon;
        $projet->content = $request->content;
        $projet->desc = substr($request->titre, 0, 50);

        if ($request->image != null) {    
            $argImg = [
                'request' => $request->image,
                'disk1' => 'projets',
                'disk2' => 'projetsThumbs',
                'x' => 360,
                'y' => 260,
            ];

            $projet->image = $this->imageResize->imageStore($argImg);

        }

        if ($projet->save()){

            return redirect()->route('projets.index')->with(["status"=>"success", "message" => 'Votre projet a bien été enregistré']);

        } else {
            return redirect()->route('projets.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        return view('admin.projets.show', compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $icons = DB::table('icons')->paginate(10);
        return view('admin.projets.edit', compact('projet', 'icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjetRequest $request, Projet $projet)
    {
         $projet->titre = $request->titre;
        $projet->icon = $request->icon;
        $projet->content = $request->content;
        $projet->desc = substr($request->titre, 0, 50);

        if ($request->image != null) {    
            $argImg = [
                'request' => $request->image,
                'disk1' => 'projets',
                'disk2' => 'projetsThumbs',
                'x' => 360,
                'y' => 260,
            ];
            $this->imageResize->imageDelete($projet->image);
            $projet->image = $this->imageResize->imageStore($argImg);

        }

        if ($projet->save()){

            return redirect()->route('projets.index')->with(["status"=>"success", "message" => 'Votre projet a bien été enregistré']);

        } else {
            return redirect()->route('projets.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        if($projet->delete()) {
            if($projet->image != null) {
                $this->imageResize->imageDelete($projet->image);
            }
            return redirect()->route('projets.index')->with(["status"=>"success", "message" => 'Votre projet a bien été supprimé']);

        } else {
            return redirect()->route('projets.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }
    }
}
