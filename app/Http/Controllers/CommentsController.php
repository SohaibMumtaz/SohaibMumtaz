<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store(Request $request){
        $validated = $request->validate([
            'comment' => 'required|max:255',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $comment = Comment::create($validated);

        return redirect()->back()->with('success','Your Comment was posted!');
        
       
    }
}
