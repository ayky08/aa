<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class FollowController extends Controller
{

    public function followlist(Request $request)
    {
        $followIds = DB::table('follows')
        ->where('follower_id',Auth::id())
        ->pluck('user_id');

        $userIcons = DB::table('users')
        ->whereIn('id',$followIds)
        ->get();

        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->whereIn('posts.user_id',$followIds)
            ->select('users.name', 'users.image', 'users.id','posts.id','posts.post','posts.created_at')
            ->get();

        return view('follows.follow',['userIcons' => $userIcons, 'posts' => $posts ]);

    }
}
