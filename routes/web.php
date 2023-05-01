<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvpost_ider within a group which
| contains the "web" mpost_iddleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])
    ->name('home.index');
Route::get('/contact',[HomeController::class, 'contact'])
    ->name('home.contact');

Route::get('/single', AboutController::class);

Route::resource('posts', PostsController::class)->only('index','show','create','store');

$posts = BlogPost::all();

// $posts = [
//     1 => [
//         'title' => 'Intro to Laravel',
//         'content' => 'This is a short intro to Laravel',
//         'is_new' => true,
//         'has_comments' => true
//     ],
//     2 => [
//         'title' => 'Intro to PHP',
//         'content' => 'This is a short intro to PHP',
//         'is_new' => false
//     ],
//     3 => [
//         'title' => 'Intro to Controllers',
//         'content' => 'This is a short intro to Controllers',
//         'is_new' => false
//     ]
// ];   

Route::get('/posts', function() use ($posts){
    
    return view('posts.index', ['posts'=>$posts]);
});

Route::get('/posts/{post_id?}', function ($post_id = 1) use ($posts) { 

    abort_if(!isset($posts[$post_id]), 404, 'This page does not exist yet :(');

    return view('posts.show', ['post'=>$posts[$post_id]]);
})->name('posts.show');

Route::prefix('/fun')->name('fun.')->group(function() use($posts){
    Route::get('/responses', function() use ($posts){
        return response($posts, 201)
        ->header('Content-Type','application/json')
        ->cookie('MY_COOKIE','Roi Gamba', 3600);
    });
    
    Route::get('/redirect', function(){
        return redirect('contact');
    });
    
    Route::get('/back', function(){
        return back();
    });
    
    Route::get('/named-route', function(){
        return redirect()->route('posts.show',['post_id'=>1]);
    });
    
    Route::get('/away', function(){
        return redirect()->away('https://google.com');
    });
    
    Route::get('/json', function() use ($posts){
        return response()->json($posts);
    });
    
    Route::get('/download', function() use ($posts){
        return response()->download(public_path('/me.png'), 'profile.png');
    });
});