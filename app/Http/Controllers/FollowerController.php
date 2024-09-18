<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class FollowerController extends Controller
{
    public function followerlist(Request $request)
    {
        $followerIds = DB::table('follows')
        ->where('user_id',Auth::id())
        ->pluck('follower_id');

        $userIcons = DB::table('users')
        ->whereIn('id',$followerIds)
        ->get();

        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->whereIn('posts.user_id',$followerIds)
            ->select('users.name', 'users.image', 'users.id','posts.id','posts.post','posts.created_at')
            ->get();

        return view('follows.follow',['userIcons' => $userIcons, 'posts' => $posts ]);

    }
}
