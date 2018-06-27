<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('index');
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
