<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;

class NewsController extends Controller
{
    public function index(){
        $news = News::getAllNews();

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
}
