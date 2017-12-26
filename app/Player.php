<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends \Eloquent
{
    protected $guarded = ['id'];

    public static function getPlayers($id){
        return self::where('team_id',$id)->orderBy('created_at', 'DESC')->get();
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
