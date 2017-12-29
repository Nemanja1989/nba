<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    //if you are logged in than you will be redirected to teams
    public function __construct(){
        $this->middleware('guest');
        $this->middleware('checkVerified', ['only' => ['store']]);
    }

    public function create(){
        return view('login.create');
    }

    public function store(){
        if(!auth()->attempt(
            request(['email','password'])
        )){
            return back()->withErrors([
                'message' => 'Bad Credetials. Please try AGAIN YOU IDIOT!'
            ]);
        }

        return redirect(route('teams'));
    }

    public function destroy(){
        auth()->logout();

        return redirect(route('login'));
    }
}
