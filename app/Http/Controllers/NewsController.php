<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;

class NewsController extends Controller
{
    public function index(){
        $news = News::with('user')
            ->latest()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('news.news',compact('news'));
    }

    public function show($id){
        $oneNews = News::find($id);
        $teams = $oneNews->teams()->get();

        return view('news.one_news',compact('oneNews', 'teams'));
    }

    public function teamNews($id){
        //get team and all news with team id
        $team = Team::find($id);
        $teamNews = $team->news()->paginate(1);

        //sending team as parameter is not good but works
        return view('news.news_team',compact('teamNews', 'team'));
    }

    public function create() {
        $teams = Team::all();

        return view('news.create', compact('teams'));
    }

    public function store(){
        $this->validate(\request(), [
                'title'     => 'required',
                'content'   => 'required'
                ]);

        $news = new News();

        $news->title = \request('title');
        $news->content = \request('content');
        $news->user_id = auth()->user()->id;

        $news->save();

        $news->teams()->attach(\request('teams'));

        session()->flash('success_message', 'Thank you for publishing article on www.nba.com');

        return redirect('news');
    }
}
