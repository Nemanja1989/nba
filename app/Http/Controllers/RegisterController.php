<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserVerified;
use App\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*public function __construct(){
        $this->middleware('guest');
    }*/

    //if you are logged in than you will be redirected to teams
    public function __construct(){
        $this->middleware('guest');
    }

    public function create(){
        return view('register.create');
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6 | confirmed'
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->is_verified = false;

        $user->save();

        Mail::to($user)
            ->send(new UserVerified($user));

        return redirect(route('login'));
    }

    public function verify($id){
        $user = User::find($id);
        $user->is_verified = true;
        $user->save();

        session()->flash('messageSuccess', 'You verified succesfuly! You can login now!');

        return redirect(route('login'));
    }

}
