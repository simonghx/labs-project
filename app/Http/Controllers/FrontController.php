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
        $services = Service::all()->random(3);
        $servicesAll = Service::all()->random(9);
        $servShuffled = $servicesAll->shuffle();
        $testimonials = Testimonial::with('client')->get();
        $teams = User::where('role_id', 2)->get();
        return view('index', compact('carousels', 'services', 'testimonials', 'servShuffled', 'teams'));
    }

    public function services() {
        $servicesAll = Service::paginate(9);
        return view('front.services', compact('servicesAll'));
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
