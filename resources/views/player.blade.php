@extends('layouts.app')

@section('content')
 

    <div class="container">
            @if(session()->get('fail'))
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ session()->get('fail') }}  
            </div> 
            @endif

            @if(session()->get('edit'))
            <div class="notification is-info">
                <button class="delete"></button>
                {{ session()->get('edit') }} 
            </div> 
            @endif  

        <div class="columns is-marginless is-centered">
            <div class="column is-12">
                <nav class="card">
                    <header class="card-header ">
                        <p class="card-header-title">
                            Player 
                        </p> 
                    </header>
                     
                    <div class="card-content ">  
                    <a href="home" class="button is-warning">Home  <i class="fas fa-home"></i></a>
                    <a href="addplayer" class="button is-success">Add Player <i class="fas fa-user-plus"></i></a>
                    
                         <table class="table">
                          <thead>
                            <tr>   
                              <th> No</th>
                              <th> Name</th>
                              <th> National Team </th>
                              <th> Position </th>
                              <th> Answer  </th> 
                              <th> Difficulty </th> 
                              <th> Hints </th> 
                              <th> Edit  </th> 
                              <th> Delete </th> 
                            </tr>
                          </thead> 
                          <tbody>
                            @foreach ($player as $players)
                                <tr>  
                                    <td>{{ $players->id }}</td> 
                                    <td>{{ $players->name }}</td> 
                                    <td>{{ $players->national_team }}</td> 
                                    <td>{{ $players->position }}</td> 
                                    <td>{{ $players->answer }}</td>
                                    <td>{{ $players->difficulty }}</td>
                                    <td>{{ $players->hint }}</td>  
                                    
                                    <td>  <a href="{{ route('crud.edit',$players->id)}}" class="button is-info">Edit</a>    </td> 
                                    <td>
                                     <form action="{{ route('crud.destroy', $players->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button is-danger" type="submit">Delete</button>
                                    </form>  
                                    </td>   
                                </tr> 
                                <tr >
                                    <td>   
                                        <b> Clubs of <i> {{ $players->name }} </i> </b> <br>  
                                            @foreach ($club as $logo)
                                                @if($logo->player_id == $players->id ) 
                                                    <td> 
                                                       <img src="{{url($logo->Club[0]->photo)}}" height=80 width=80/>  
                                                       <!-- <i class="fas fa-forward"></i>  -->
                                                       
                                                       <br> <b> Club : </b> {{ $logo->Club[0]->name }} 
                                                       <br> <b> Duration : </b>{{ $logo->duration }}
                                                    </td>  
                                                @endif 
                                            @endforeach 
                                            
                                    </td> 
                                   
                                </tr>

                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
 