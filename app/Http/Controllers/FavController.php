<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Favourite;
use Illuminate\Support\Facades\Auth;

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

        return redirect('home')->with('success', 'Favoriet toegevoegd!');

    }

    public function destroy($id)
    {
        $favourite = Favourite::find($id);

        if(auth()->user()->id !== $favourite->user_id) {
            return redirect('home')->with('error', 'Unauthorized!');

        }

        $favourite->delete();
        return redirect('home')->with('success', 'Favourite removed!');

    }

    public function showfavourite($id) {

        if(Auth::guest()) {
            return "hoi";
        }

        if(auth()->user()->id == $id) {
            $favourites = DB::table('favourites')
            ->join('posts', 'favourites.post_id', '=',  'posts.id')
            ->join('users', 'favourites.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->select('posts.title', 'users.name', 'favourites.*')
            ->get();

        return view('home.fav')->with('favourite', $favourites);

        } else {
            return redirect('/')->with('error', 'Unauthorized access');




            // GEFAALDE POGINGEN

        //  $favourites = Favourite::where('user_id', auth()->user()->id)->get();

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



        }
    }
}

