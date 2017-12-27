<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;

class TeamsController extends Controller
{
    //if not logged in than redirect to login, cant access
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $teams = Team::getAllTeams();

        return view('teams',compact('teams'));
    }

    public function show($id){
        $team = Team::find($id);

        return view('team',compact('team') );
    }
}
