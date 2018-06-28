<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests\NewsletterRequest;
use Mail;
use App\Mail\NewsletterMail;
use App\Mail\UnscribeNewsletterMail;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::paginate(10);
        return view('admin.newsletter.index', compact('newsletters'));
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
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        if($newsletter->delete()){
            
            Mail::to($newsletter->letter_email)->send(new UnscribeNewsletterMail($newsletter));
            return redirect()->route('newsletter.index')->with(["status"=>"success", "message" => "L'adresse a bien été désinscrite."]);

        } else {
            return redirect()->route('newsletter.index')->with(["status"=>"danger", "message" => 'Une erreur est survenue, veuillez réessayer plus tard']);
        }
    }
}
