<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr\Throw_;

class SessionsController extends Controller
{
    //
    public function destroy(){
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $validated = request()->validate([
           'email' => 'required',
           'password' => 'required',
        ]);

        if(Auth::attempt($validated)){
             session()->regenerate();
             return redirect('/')->with('success','Welcome Back!');
        }

        // return back()
        // ->withInput()
        // ->withErrors(['email', 'Your provided credentials could not be verified.']);

        throw ValidationException::withMessages([
            'email'=>'Your provided credentials could not be verified.'
        ]);
       
     }
        
}
