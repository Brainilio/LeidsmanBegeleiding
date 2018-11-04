<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use Carbon\Carbon;
use Carbon\CarbonInterval;

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

    public function edit($id) {

        $user_id = auth()->user()->id;
        $user_requested = $id;
        $user =  User::find($id);

        if($user_id == $user_requested) {
            return view('home/edituser')->with('user', $user);
        } else {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }

    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . \Auth::user()->id
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');


        $user->save();

        return redirect('/home')->with('success', 'Profile Updated');



    }


}
