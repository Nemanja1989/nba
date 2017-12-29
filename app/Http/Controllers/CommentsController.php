<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    protected function store(Request $request){
        $this->validate(request(),[
            'content' =>'required|min:10'
        ]);

        Comment::create($request->all());

        return redirect(route('team',['id'=>request('team_id')]));
    }
}
