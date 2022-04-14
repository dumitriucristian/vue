<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/posts', function () {

    $posts = Post::all();
    return view('posts',['posts'=> $posts]);
});

Route::get('/post/{post}', function ($slug) {
    //dd( $slug );
    return view('post',['post' => Post::find($slug)]);

})->where('post', '[A-z_\-]+');

Route::get('/vue', function () {
    return view('vue');
});
Route::get('/tasks', function () {
    return view('tasks');
});
Route::get('/bulma', function () {
    return view('bulma');
});

Route::get('/latest-vue', function (){
    return view('latest-view');
});
Route::get('/email-form', function (){
    return view('email-form');
});
Route::get('/loops', function (){
    return view('loops');
});
