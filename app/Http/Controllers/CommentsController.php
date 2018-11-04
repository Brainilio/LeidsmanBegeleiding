<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\User;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required',

        ]);

        $post_id = Post::find($request->post_id)->id;

            //create new post
        $comment = new Comment;
        $comment->name = $request->input('name');
        $comment->comment = $request->input('comment');
        $comment->email = auth()->user()->email;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post_id;
        $comment->save();

        return redirect()->route('posts.show', [$post_id])->with('success', 'Comment added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(auth()->user()->id == $id) {
            $comments = DB::table('comments')
            ->where('user_id', $id)
            ->get();


            return view('home.comments')->with('comments', $comments);
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if(auth()->user()->id !== $comment->user_id && auth()->user()->admin !== 1) {
            return redirect()->route('posts.show', [$comment->post_id])->with('error', 'Unauthorized!');

        }




        $comment->delete();
        return redirect()->route('posts.show', [$comment->post_id])->with('success', 'Comment removed!');

    }
}
