<?php

namespace App\Http\Controllers;

use App\Player;
use App\Club;
use App\PlayerClub;
use DB;

use Illuminate\Http\Request;

class ApiPlayerController extends Controller
{
    public function playerinfo()
    {  
        $player = Player::with('PlayerClub.club')   
        ->get();
        return $player;
    }
}
