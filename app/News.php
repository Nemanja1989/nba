<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class News extends Model
{
    public $table = 'news';

    public static function getAllNews(){
        //this with loads user data so we don't load it in 20 queries latter
        return self::with('user')->paginate(5);

    }

    public static function getOneNews($id){
        return self::find($id);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function teams() {
        return $this->belongsToMany(Team::class,'news_teams');
    }
}
