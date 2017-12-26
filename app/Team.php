<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends \Eloquent
{
    protected   $guarded = ['id'];

    public static function getAllTeams(){
        return self::get();
    }

    public function players() {
        return $this->hasMany(Player::class);
    }
}
