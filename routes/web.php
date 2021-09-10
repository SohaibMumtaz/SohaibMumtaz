<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[PostController::class, 'index'])->name('home');
// Route::get('/', function () {
//    $post = Post::latest();
//    if(request('search')){
//       $post->where('title', 'like', '%'. request('search'). '%')
//       ->orWhere('body','like', '%'. request('search'). '%');
//    }
//    return view('posts', [
//       'posts'=> $posts = $post->get(),
//       'categories'=>Category::all()
//    ]);

// })->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts/create', [PostController::class, 'store'])->middleware('admin');

// Route::get('post/{post:slug}', function (Post $post) {
//    return view('post', [
//                         'post'=>$post
//                        ]);
   
// });

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//       'posts'=>$category->posts,
//       'currentCategory'=>$category,
//       'categories'=>Category::all()
//    ]);
    
// })->name('category');

// Route::get('authors/{author:username}', function (User $author) {
//    return view('posts.index', [
//       'posts'=>$author->posts
//    ]);
    
// });

// ---------------creating route for register----------------
Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// login route 
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
//logout route
Route::get('logout',[SessionsController::class,'destroy'])->middleware('auth');

//comment routes
Route::post('comment', [CommentsController::class,'store']);

