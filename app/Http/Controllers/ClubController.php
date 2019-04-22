<?php

namespace App\Http\Controllers;
use App\Player;
use App\Club;
use Illuminate\Http\Request;
use File;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Club::all();
        return view('club',['club'=>$club]);
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

    public function addclub()
    {
        return view('addclub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'  ,
            'filenames'=>'required'
        ]);
        
        $club = new Club([
            'name' => $request->get('name') 
        ]);

        $imageName = $request->file('filenames');
     
        if($imageName!=null)
        {              
            $extension = $imageName->getClientOriginalExtension(); 
            $imageName->move(public_path('images/logo/'), $request->name.'.'.$extension);    
            $name = 'images/logo/'.$request->name.'.'.$extension ; 
            $club->photo = $name ;
            $club->save();
        }         
        $club->save();
        return redirect('/club')->with('edit', 'Club has been Added !!');
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
        $club = Club::find($id);
        return view('/editclub', compact('club'));     
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
            'name'=>'required'  
          ]);

          $club = Club::find($id);
          $imageName = $request->file('filenames');
     
          if($imageName!=null)
          {
              File::delete(public_path($club->photo));
              $extension = $imageName->getClientOriginalExtension(); 
              $imageName->move(public_path('images/logo/'), $request->name.'.'.$extension);    
              $name = 'images/logo/'.$request->name.'.'.$extension ; 
              $club->photo = $name ;
              $club->save();
          } 

        //   if($request->chkimage == 'on'){
        //       File::delete(public_path($Categorie->image));
        //       $Categorie->image = null ;
        //       $Categorie->save();
        //   }


          $club->name = $request->get('name'); 
          $club->save();
    
          return redirect('/club')->with('edit', 'Club has been updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $club = Club::find($id); 
        File::delete(public_path($club->photo));
        $club->delete();
        return redirect('/club')->with('fail', 'Club Deleted Success!!'); 
    }
}
