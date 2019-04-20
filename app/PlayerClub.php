<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerClub extends Model
{
    protected $table = 'player_club';

    public function player(){
        return $this->HasMany(Player::class,'id');
    }

    public function club(){
        return $this->HasMany(Club::class,'id','club_id');
    }
    
}
