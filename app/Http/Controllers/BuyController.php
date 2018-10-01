<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Favourite;

class BuyController extends Controller
{

    public function buy(Request $request) {
        //dd($request);
        $favourite = new Favourite;
        $post = Post::find($request->id);
        $user = auth()->user();
        $favourite->user_id = $user->id;
        $favourite->post_id = $post->id;
        $favourite->title = $post->title;
        $favourite->body = $post->body;
        $favourite->save();
        return redirect('/posts')->with('success', 'Pakket gekocht!');



    }
}

