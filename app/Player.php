<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $table = 'player';

    protected $fillable = [
        'name', 'national_team', 'position', 'answer'
    ];
    
    public function Club(){
            return $this->HasMany(Club::class,'id');
    }
}
