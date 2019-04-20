<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'club';

    public function PlayerClub(){
        return $this->HasMany(PlayerClub::class,'id','club_id');
    } 
 
}
