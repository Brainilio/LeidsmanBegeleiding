<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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

        return redirect('home/fav')->with('success', 'Pakket gekocht!');

    }

    public function showfavourite() {
        $favourites = Favourite::where('user_id', auth()->user()->id)->get();
        $favourite_post_id = Favourite::select('post_id')->get();

        // $post = Post::select('title')->where('id', $favourite_post_id)->get();

        $post = DB::table('posts')
        ->join('favourites', 'posts.id', '=', 'favourites.post_id')
        ->select('posts.title', 'favourites.id')
        ->get();

        // $post = Post::select('title')->where('id', $favourite_post_id)->get();
        // $post = Post::where('id', $favourite_post_id)->get();



        return view('home.fav')->with('favourite', $favourites)->with('postname', $post);
    }
}

