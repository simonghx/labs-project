<?php
namespace App\Http\Controllers;


use App\Carousel;
use App\User;
use App\Service;
use App\Client;
use App\Tag;
use App\Categorie;
use App\Testimonial;
use App\Projet;
use App\Role;
use App\Content;
use App\Article;
use App\Newsletter;
use Storage;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $carousels = Carousel::all();
        $services=Service::all()->random(3);
        return view('index', compact('carousels', 'services'));
    }

    public function services() {
        return view('front.services');
    }

    public function blog() {
        return view('front.blog');
    }

    public function article() {
        return view('front.article');
    }
   
    public function contact() {
        return view('front.contact');
    }
}
