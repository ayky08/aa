<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ProfileController extends Controller
{
        public function profile(Request $request)
    {
        $myProfile = DB::table('users')
            ->where('id', Auth::id())
            ->first();
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.id', Auth::id())
            ->select('users.name', 'users.image', 'users.id','posts.id','posts.post','posts.created_at')
            ->get();
        return view('profiles.profile', ['myProfile' => $myProfile, 'posts' => $posts]);
    }

        public function index()
    {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'users.image', 'users.id','posts.id','posts.post','posts.created_at')
            ->get();
            //dd($post);
        return view('profiles.profile', ['myProfile' => $myProfile, 'posts' => $posts]);
    }
}
