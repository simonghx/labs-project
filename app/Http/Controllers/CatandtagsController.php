<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Tag;

class CatandtagsController extends Controller
{


    public function index(){

        $categories = Categorie::all();
        $tags = Tag::all();
        return view('admin.catandtags.index', compact('categories', 'tags'));
    }

}
