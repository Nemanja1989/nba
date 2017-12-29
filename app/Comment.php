<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}