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
            <div class="column is-10">
                <nav class="card">
                    <header class="card-header ">
                        <p class="card-header-title">
                            Player 
                        </p> 
                    </header>
                    
                    <div class="card-content ">  
                    <a href="home" class="button is-warning">Home  <i class="fas fa-home"></i></a>
                    <a href=" " class="button is-success">Add Player <i class="fas fa-user-plus"></i></a>
                    
                    <!-- <div class="modal  is-active">
                        <div class="modal-background"></div>
                        <div class="modal-card">
                            <header class="modal-card-head">
                            <p class="modal-card-title">Add Player</p>
                            <button class="delete" aria-label="close"></button>
                            </header>
                            <section class="modal-card-body">
                            <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Name:</label> 
                            <div class="field">
                            <div class="control">
                                <input required name="name" class="input is-primary is-rounded" type="text"  >  
                            </div>

                            <div class="form-group">
                          <label for="recipient-name" class="col-form-label">National Team:</label> 
                            <div class="field">
                            <div class="control">
                                <input required name="national_team" class="input is-primary is-rounded" type="text"  >  
                            </div>

                            <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Position:</label> 
                            <div class="field">
                            <div class="control">
                                <input required name="position" class="input is-primary is-rounded" type="text"  >  
                            </div>
                            </section>
                            <footer class="modal-card-foot">
                            <button class="button is-success">Save changes</button>
                            <button class="button">Cancel</button>
                            </footer>
                        </div>
                        </div> -->

                        <table class="table">
                          <thead>
                            <tr>   
                              <th> No</th>
                              <th> Name</th>
                              <th> National Team </th>
                              <th> Position </th>
                              <th> Answer  </th> 
                              <th> Difficulty </th> 
                              <!-- <th> Clubs </th>  -->
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
                                                        <img src="{{url($logo->Club[0]->photo)}}" height=80 width=80/>   
                                                        <br> Club : {{ $logo->Club[0]->name }} 
                                                        <br>Duration : {{ $logo->duration }}  
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
 