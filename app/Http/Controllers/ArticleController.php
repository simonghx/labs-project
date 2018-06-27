<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Categorie;
use Auth;
use Storage;
use App\Services\ImageResize;
use App\Http\Requests\StoreArticleRequest;

use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $articles = Article::with('user', 'tags',  'categorie')->get()->sortByDesc('created_at');
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        //récupérer les 50 premiers caractères de mon article pour en faire un entete
        $article->entete = substr($request->contenu, 0, 100);
        $article->user_id = Auth::user()->id;

        if ($request->image != null) {    
            $argImg = [
                'request' => $request->image,
                'disk1' => 'articles',
                'disk2' => 'articlesThumbs',
                'x' => 750,
                'y' => 268,
            ];

            $article->image = $this->imageResize->imageStore($argImg);

        }

        $article->categorie_id = $request->categorie_id;
      
      if ($article->save()){
            
            foreach ($request->tags_id as $tag) {
                $article->tags()->attach($tag);
            }

            return redirect()->route('articles.index')->with(["status"=>"success", "message" => 'Votre article a bien été enregistré']);

        } else {
            return redirect()->route('articles.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $this->authorize('view', $article);
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('view', $article);
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('admin.articles.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        //récupérer les 50 premiers caractères de mon article pour en faire un entete
        $article->entete = substr($request->contenu, 0, 100);

        if ($request->image != null) {    
            $argImg = [
                'request' => $request->image,
                'disk1' => 'articles',
                'disk2' => 'articlesThumbs',
                'x' => 750,
                'y' => 268,
            ];

            $this->imageResize->imageDelete($article->image);
            $article->image = $this->imageResize->imageStore($argImg);

        }

        $article->categorie_id = $request->categorie_id;
      
      if ($article->save()){
            $article->tags()->detach();
            foreach ($request->tags_id as $tag) {
                $article->tags()->attach($tag);
            }

            return redirect()->route('articles.show', ['article' => $article->id])->with(["status"=>"success", "message" => 'Votre article a bien été modifié']);

        } else {
            return redirect()->route('articles.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        if($article->delete()) {

            $article->tags()->detach(); 

            if($article->image != null) {
                $this->imageResize->imageDelete($article->image);
            }
            return redirect()->route('articles.index')->with(["status"=>"success", "message" => 'Votre article a bien été supprimé']);
        } else {
            return redirect()->route('articles.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }
    }
}
