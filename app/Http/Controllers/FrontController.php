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
use App\Http\Requests\ContactRequest;
use App\Http\Requests\NewsletterRequest;
use App\Events\Contact;
use Mail;
use App\Mail\NewsletterMail;

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
        $projets = Projet::all()->sortByDesc('created_at')->take(6);
        $projets1 = $projets->splice(3);
        $projets2 = $projets->all();

        $lastProjets = Projet::all()->sortByDesc('created_at')->take(3);

        return view('front.services', compact('servicesAll', 'projets1', 'projets2', 'lastProjets'));
    }

    public function blog() {

        $articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(3);
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('front.blog', compact('articles', 'categories', 'tags'));
    }

    public function article($id) {
        $article = Article::find($id);
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('front.article', compact('article', 'categories', 'tags'));
    }
   
    public function contact() {
        return view('front.contact');
    }

    public function contactForm(ContactRequest $request){
        
            event(new Contact($request));        
            return redirect()->route('main');

    }

    public function newsletterForm(NewsletterRequest $request) {

        $newsletter = new Newsletter;
        $newsletter->letter_email = $request->letter_email;
        
        if($newsletter->save()) {
            // dd($request->letter_email);
            Mail::to($request->letter_email)->send(new NewsletterMail($request));
            return redirect()->route('services');
        }
       
    }
}
