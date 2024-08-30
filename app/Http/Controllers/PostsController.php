<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //
        public function hello()
    {
        echo 'Hello World!!<br>';
        echo 'コントローラーから';
    }

        public function index()
    {
                $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'users.image', 'users.id','posts.post','posts.created_at')
            ->get();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'post' => $post,
            'created_at' => now(),
            'user_id' => Auth::id(),
        ]);
        return redirect('/top');
    }
    public function delete(Request $request)
{
    $id = $request->input('id');
    DB::table('posts')
        ->where('id', $id)
        ->delete();

    return redirect('/top');
}
}
