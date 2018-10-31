<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logged_admin = auth()->user()->id;
        $posts = DB::table('posts')
                 ->where('user_id', $logged_admin)
                 ->get();

        return view('home')->with('posts', $posts);
    }

    public function status(Request $request) {
       $postid = $request->id;

       $currentstatus = $request->get('statusbutton');
       if($currentstatus == "Active") {

        $post = Post::find($postid);
        $post->status = 2;
        $post->save();
        return redirect('home')->with('succes', 'Post Updated');

       } else {

        $post = Post::find($postid);
        $post->status = 1;
        $post->save();
        return redirect('home')->with('succes', 'Post Updated');

       }






    }


}
