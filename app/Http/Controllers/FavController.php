<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Favourite;

class FavController extends Controller
{

    public function favourite(Request $request) {
        //dd($request);
        // $favourite = new Favourite;
        // $post = Post::find($request->id);
        // $user_id = auth()->user()->id;
        // $favourite->user_id = $user_id;
        // $favourite->post_id = $post;
        // $favourite->save();
        // return redirect('/posts')->with('success', 'Pakket gekocht!');

        $this->validate($request, array(
            'id' => 'required'
        ));

        $favourite = new Favourite;
        $favourite->user_id = auth()->user()->id;
        $favourite->post_id = Post::find($request->id)->id;
        $favourite->save();

        return redirect('/posts')->with('success', 'Pakket gekocht!');

    }
}

