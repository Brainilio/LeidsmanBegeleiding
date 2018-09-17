<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller //elke controller moet een controller extenden
{
    public function index() {
        $title = 'Welcome to Homepage!';
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'About us!';
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        return view('pages.services');
    }
}


