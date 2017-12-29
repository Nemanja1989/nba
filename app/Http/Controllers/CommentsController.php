<?php

namespace App\Http\Controllers;

use App\Mail\CommentReceived;
use App\Team;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{

    public function __construct(){
        $this->middleware('forbiddenCommentWords');
    }

    protected function store(Request $request){
        $this->validate(request(),[
            'content' =>'required|min:10'
        ]);

        $comment = Comment::create($request->all());

        $team = Team::find(request('team_id'));

        Mail::to($team->email)
            ->send(new CommentReceived($team, $comment));

        return redirect(route('team',['id'=>request('team_id')]));
    }

    public function forbidden(){

        return view('comments.forbiddenCommentWords');
    }
}
