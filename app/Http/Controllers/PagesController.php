<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller //elke controller moet een controller extenden
{
    public function index() {
        $title = 'Welkom bij Leidsman Begeleiding!';
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'About us!';
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $title = 'This is what we have to offer!';
        $data = array(
          'services' => ['Rekenen', 'Wiskunde begeleiding', 'Examen voorbereidingen']

        );

        return view('pages.services')->with('title', $title)->with($data);
    }
}


