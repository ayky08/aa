<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UserController extends Controller
{
        public function follow(Request $request)
    {
        DB::table('follows')
        ->insert([
            'user_id' => $request->id,
            'follower_id'=>Auth::id(),
            'created_at'=>now()
        ]);
        return redirect('/search');

    }

    public function unfollow(Request $request)
    {
         DB::table('follows')
        ->where([
            'user_id' => $request->id,
            'follower_id'=>Auth::id(),
        ])->delete();
        return redirect('/search');
    }
}
