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
            ->select('users.name', 'users.image', 'users.id','posts.id','posts.post','posts.created_at')
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
public function updateForm($id){
    $post = DB::table('posts')
        ->where('id', $id)
        ->first();
    return view('posts.updateForm', ['post' => $post]);
}

/*public function updateForm(){
    $post = DB::table('posts')
        ->where('id', 1)
        ->first();
    return view('posts.updateForm', compact('post'));
}*/

 public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
    return redirect('/top');
    }

 public function search(Request $request){
       $follows=DB::table('follows')
       ->where('follower_id',Auth::id())
       ->get();
    if($request->isMethod('post')){
        $keyword = $request->keyword;
        $users = DB::table('users')
        ->where('name','like',"%".$keyword."%")
        ->get();
    }else{
    $users = DB::table('users')
    ->get();
    }
    return view('posts.search', ['users' => $users,'follows' =>$follows]);
 }

}
