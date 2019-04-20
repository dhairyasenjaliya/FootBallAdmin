@extends('layouts.app')

@section('content')

    <div class="container"> 

        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <nav class="card">
                    <header class="card-header ">
                        <p class="card-header-title">
                            Player 
                        </p> 
                    </header>
                    
                    <div class="card-content">  
                    <a href="/home" class="button is-warning">Home  <i class="fas fa-home"></i></a>

                    <form method="post" enctype="multipart/form-data" action="{{ route('crud.update', $player->id) }}">
                        @method('PATCH')
                        @csrf
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Name:</label> 
                            <div class="field">
                            <div class="control">
                                <input required name="name" class="input is-primary is-rounded" type="text" value={{ $player->name }}>  
                            </div>

                            <div class="form-group">
                          <label for="recipient-name" class="col-form-label">National Team:</label> 
                            <div class="field">
                            <div class="control">
                                <input required name="national_team" class="input is-primary is-rounded" type="text" value={{ $player->national_team }}>  
                            </div>

                            <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Position:</label> 
                            <div class="field">
                            <div class="control">
                                <input required name="position" class="input is-primary is-rounded" type="text" value={{ $player->position }}>  
                            </div>
                            <!-- 
                            <div class="dropdown is-active">
                                <div class="dropdown-trigger">
                                    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                                    <span>Dropdown button</span>
                                    <span class="icon is-small">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                    </button>
                                </div>
                                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                    <a href="#" class="dropdown-item">
                                        True
                                    </a>
                                    <a class="dropdown-item">
                                        False
                                    </a>
                                    
                                    </div>
                                </div>
                            </div> -->

                            
                                         
                                         @foreach ($club as $logo)
                                             @if($logo->player_id == $player->id )  
                                             <br>
                                                 <img src="{{url($logo->Club[0]->photo)}}" height=80 width=80/>   
                                                 <br> Club : {{ $logo->Club[0]->name }} 
                                                 <br>Duration : {{ $logo->duration }}  
                                             @endif
                                         @endforeach  

                    <br>
                        <button type="submit" class="button is-success">Update</button> 
                        <a href="{{route('player') }}" class="button is-danger">Cancel</a>
                    </form>
  
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
 