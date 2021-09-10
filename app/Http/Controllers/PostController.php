<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){
      
        return view('posts.index', [
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author']))
            ->paginate(6)
            ->withQueryString()
           
         ]);
    }
    
    public function show(Post $post){
        return view('posts.show', [
            'post'=>$post
           ]);
    }

    public function create(Category $category){
        return view('posts.create', ['category'=>$category]);
    }

    public function store(Request $request){
        // $path = $request->file('thumbnail')->store('thumbnails');

        // return $path;
        // ddd($request->file('thumbnail'));

        $userId = Auth::user()->id;
        $validated= $request->validate([
            'title'=>'required|max:255',
            'excerpt'=>'required',
            'slug'=>'required|max:255|unique:posts,slug',
            'body'=>'required',
            'category_id'=> 'required|exists:categories,id',
            'thumbnail'=> 'required|image',
        ]);
        $validated['user_id'] = $userId;
        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Post::create($validated);
        return redirect('/')->with('success','Your post has been published!');

    }
}
