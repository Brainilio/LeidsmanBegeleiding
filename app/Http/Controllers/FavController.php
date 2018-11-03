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

    public function showfavourite($id) {

         $favourites = Favourite::where('user_id', auth()->user()->id)->get();

        //  $post = Post::where('id', '19')->with(['favourites', 'id'])->get();

        //  $posts = Favourite::with('posts')->where('post_id', '=', 'posts.id')->get();
        //  dd($posts);

//  ik wil favourites->post_id in een variabele stoppen
// en deze wil ik dan searchen in mijn posts naam waar id = favourites->post_id

// post titel opvragen waar post id hetzelfde is als favourite.post_id waar
// user_id de ingelogde user_id is





        // $favourite_post_id = Favourite::select('post_id')->get();





        // $post = Post::select('title')->where('id', $favourite_post_id)->get();

        // $post = DB::table('posts')
        // ->join('favourites', 'posts.id', '=', 'favourites.post_id')
        // ->select('posts.title', 'favourites.id')
        // ->get();

        // $favourites = DB::table('favourites')
        // ->join('users', 'favourites.user_id', '=', $favourite_user)
        // ->select('users.name', 'users.id')
        // ->get();

        // $post = Post::select('title')->where('id', $favourite_post_id)->get();
        // $post = Post::where('id', $favourite_post_id)->get();



        return view('home.fav')->with('favourite', $favourites);

        // ->with('postname', $post);
    }
}

