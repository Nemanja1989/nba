<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;

class TeamsController extends Controller
{
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
