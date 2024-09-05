<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('hello', [PostsController::class, 'hello']);
Route::get('/top', [PostsController::class, 'index']);
Route::post('/create', [PostsController::class, 'create']);
Route::delete('/post/delete', [PostsController::class, 'delete']);
Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);
Route::put('post/update', [PostsController::class, 'update']);
Route::get('/search', [PostsController::class, 'search']);
Route::post('/search', [PostsController::class, 'search']);
