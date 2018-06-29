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
use View;
use App\Comment;


class FrontController extends Controller
{
    public function __construct()
     {
    //its just a dummy data object.
    $contactTitre = Content::where('name', 'titre-contact')->first();
    $contactTexte = Content::where('name', 'texte-contact')->first();
    $contactSub = Content::where('name', 'sous-titre-contact')->first();
    $contactAdresse = Content::where('name', 'adresse')->first();
    $contactPostal = Content::where('name', 'postal')->first();
    $contactPhone = Content::where('name', 'phone')->first();
    $contactMail = Content::where('name', 'contact-mail')->first();
    $titreServices = Content::where('name', 'titre-services')->first();
    $categories = Categorie::all();
    $tags = Tag::all();
    $quote = Content::where('name', 'quote')->first();
    

    // Sharing is caring
    View::share('contactTitre', $contactTitre);
    View::share('contactTexte', $contactTexte);
    View::share('contactSub', $contactSub);
    View::share('contactAdresse', $contactAdresse);
    View::share('contactPostal', $contactPostal);
    View::share('contactPhone', $contactPhone);
    View::share('contactMail', $contactMail);
    View::share('titreServices', $titreServices);
    View::share('categories', $categories);
    View::share('tags', $tags);
    View::share('quote', $quote);
    }

    public function index() {
        $carousels = Carousel::all();
        $services = Service::all()->random(3);
        $servicesAll = Service::all()->random(9);
        $servShuffled = $servicesAll->shuffle();
        $testimonials = Testimonial::with('client')->get();
        $teams = User::where('role_id', 2)->get();
        $logoMain = Content::where('name', 'logo-main')->first();
        $subIntro = Content::where('name', 'sous-titre-main')->first();
        $titreAbout = Content::where('name', 'titre1')->first();
        $texteAbout1 = Content::where('name', 'texte1')->first();
        $texteAbout2 = Content::where('name', 'texte2')->first();
        $imageYoutube = Content::where('name', 'image-youtube')->first();
        $lienYoutube = Content::where('name', 'lien-youtube')->first();
        
        
        $titreTeam = Content::where('name', 'titre-team')->first();
        $titreReady = Content::where('name', 'titre-ready')->first();
        $subReady = Content::where('name', 'sous-titre-ready')->first();

        return view('index', compact('carousels', 'services', 'testimonials', 'servShuffled', 'teams', 'logoMain', 'subIntro', 'titreAbout', 'texteAbout1', 'texteAbout2', 'imageYoutube', 'lienYoutube','titreTeam', 'titreReady', 'subReady'));
    }

    public function services() {
        $servicesAll = Service::paginate(9);
        $projets = Projet::all()->sortByDesc('created_at')->take(6);
        $projets1 = $projets->splice(3);
        $projets2 = $projets->all();

        $titreProjet = Content::where('name', 'titre-projet')->first();

        $lastProjets = Projet::all()->sortByDesc('created_at')->take(3);

        return view('front.services', compact('servicesAll', 'projets1', 'projets2', 'lastProjets', 'titreProjet'));
    }

    public function blog() {

        $articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(3);
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('front.blog', compact('articles'));
    }

    public function article($id) {
        $article = Article::find($id)->with('comments')->first();
        $comments = Comment::where('articles_id', $id)->get();
        
        return view('front.article', compact('article', 'comments'));
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

    public function filterByTags($id){

        $articles = Tag::find($id)->articles()->where('tags_id', $id)->paginate(3);
        return view('front.research', compact('articles'));
    }

    public function filterByCat($id){

        $articles = Article::where('categorie_id', $id)->paginate(3);
        // dd($articles);
        return view('front.research', compact('articles'));
    }

    public function filterByTitle(Request $request){

        $title = $request->title;
        // dd($title);
        $articles = Article::where('titre', 'LIKE', '%'.$title.'%')->paginate(3);

        return view('front.research', compact('articles'));
    }
}
