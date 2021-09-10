<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function create(){
       return view('register.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($validated);
        Auth::login($user);
        return redirect('/')->with('success','Thanks for becoming a part of laracast blog!');
    }
}
