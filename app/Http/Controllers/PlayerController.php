<?php

namespace App\Http\Controllers;

use App\Player;
use App\Club;
use App\PlayerClub;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Player::with('Club')->get(); 
        $club = PlayerClub::with('Club')->orderBy('duration')->get();
        return view('player',['player'=>$player],['club'=>$club]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        $club = PlayerClub::with('Club')->orderBy('duration')->get();
        return view('/editplayer', compact('player','club'));      
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $request->validate([
            'name'=>'required', 
            'national_team'=>'required' ,
            'position'=>'required'  
        ]);

          $player = Player::find($id);
          
          $player->name = $request->get('name');
          $player->national_team = $request->get('national_team');
          $player->position = $request->get('position');
          $player->save();
    
          return redirect('/player')->with('edit', 'Player has been updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id); 
        $player->delete();
        return redirect('/player')->with('fail', 'Player Deleted Success!!');   
    }
}
