<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

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

    public function userlist() {
        $users = User::all();

        if(auth()->user()->admin !== 1) {
            return redirect('/home')->with('error', 'Niets gevonden!');
        }

        return view('home.users')->with('users', $users);
    }




    public function buy(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        $post = Post::find($id);

        return redirect('/posts')->with('success', $post);

    }
}


