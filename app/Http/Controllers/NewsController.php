<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $news = News::getAllNews();

        return view('news.news',compact('news'));
    }

    public function show($id){
        $oneNews = News::find($id);

        return view('news.one_news',compact('oneNews'));
    }
}
