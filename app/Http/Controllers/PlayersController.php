<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    //if not logged in than redirect to login, cant access
    public function __construct(){
        $this->middleware('auth');
    }

    public function show($id){
        $player = Player::find($id);

        return view('player',compact('player') );
    }


}
