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

        $favourite->user_id = "huh";
        $favourite->post_id = "huh";

        return redirect('/posts')->with('success', 'Pakket gekocht!');



    }
}

