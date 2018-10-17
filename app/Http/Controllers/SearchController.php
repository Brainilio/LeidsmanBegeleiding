<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function scopeSearch(Request $request) {
       $search = $request->get('search');
       $posts=DB::table('posts')
                ->where('title', 'LIKE', '%' .$search. "%")
                ->where('body', 'LIKE', '%' .$search. "%")
                ->where('created_at', 'LIKE', '%' .$search. "%")
                ->where('updated_at', 'LIKE', '%' .$search. "%")
                ->where('cover_image', 'LIKE', '%' .$search. "%")
                ->where('user_id', 'LIKE', '%' .$search. "%")
                ->where('id', 'LIKE', '%' .$search. "%")
                ->orderBy('created_at', 'desc');

         return view('posts.index')->with('post s', $posts);
    }
}
