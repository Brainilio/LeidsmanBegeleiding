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
                ->orWhere('body', 'LIKE', '%' .$search. "%")
                ->orWhere('created_at', 'LIKE', '%' .$search. "%")
                ->orWhere('updated_at', 'LIKE', '%' .$search. "%")
                ->orWhere('cover_image', 'LIKE', '%' .$search. "%")
                ->orWhere('user_id', 'LIKE', '%' .$search. "%")
                ->orWhere('id', 'LIKE', '%' .$search. "%")
                ->orderBy('created_at', 'desc')
                ->get();

         return view('posts.index')->with('posts', $posts);
    }
}
