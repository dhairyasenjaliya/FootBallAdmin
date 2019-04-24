<?php

namespace App\Http\Controllers;

use App\Player;
use App\Club;
use App\PlayerClub;
use DB;
use Validator;
use Str;

use Illuminate\Http\Request;

class ApiPlayerController extends Controller
{
    public function playerinfo(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'level' => 'required' 
        ]);

        if($validator->fails()) {
        return response()->json([ 'error'=> $validator->messages()], 401);
        }
 

        $player = Player::with('PlayerClub.club')->where('difficulty', $request->level)->get(); 
         
        $player = Player::with('PlayerClub.club')->where('difficulty', $request->level)->get(); 
         

        $player->map(function ($player) {
            $player['guess_name'] = str_shuffle($player->name);
            return $player;
        });
        return response()->json($player);
    }
}