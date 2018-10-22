<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;


class SearchController extends Controller
{
    public function search(Request $request) {
       $search = $request->get('search');
       $posts=  DB::table('posts')
                ->where('status', '1')
                ->where('title', 'LIKE', '%' .$search. "%")
                ->Where('body', 'LIKE', '%' .$search. "%")
                ->get();

         return view('posts.index')->with('posts', $posts);
    }
}


// ->orWhere('created_at', 'LIKE', '%' .$search. "%")
// ->orWhere('updated_at', 'LIKE', '%' .$search. "%")
// ->orWhere('cover_image', 'LIKE', '%' .$search. "%")
// ->orWhere('user_id', 'LIKE', '%' .$search. "%")
// ->orWhere('id', 'LIKE', '%' .$search. "%")
