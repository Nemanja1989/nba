<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected   $guarded = ['id'];

    public static function getAllTeams(){
        return self::paginate(2);
    }

    public function players() {
        return $this->hasMany(Player::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function news() {
        return $this->belongsToMany(News::class,'news_teams');

    }
}
