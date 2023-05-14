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

// Route::get('/single', AboutController::class);

Route::resource('posts', PostsController::class);
// ->only('index','show','create','store','edit','update','destroy');


Route::get('/posts', function () {
    $posts = BlogPost::all();
    
    return view('posts.index', ['posts' => $posts]);
})->name('posts.index');

Route::get('/posts/{post?}', function ($post = 1) {
    $post = BlogPost::findOrFail($post);
    
    abort_if(!$post, 404, 'This page does not exist yet :(');

    return view('posts.show', ['post' => $post]);
})->name('posts.show');

/* Route::prefix('/fun')->name('fun.')->group(function() {
    Route::get('/responses', function(){
        $posts = BlogPost::all();
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
    
    Route::get('/json', function(){
        $posts = BlogPost::all();
        return response()->json($posts);
    });
    
    Route::get('/download', function(){
        $posts = BlogPost::all();
        return response()->download(public_path('/me.png'), 'profile.png');
    });
}); */