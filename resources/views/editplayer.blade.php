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
                          <b><label for="recipient-name" class="col-form-label">Name:</label> </b>
                            <div class="field">
                            <div class="control">
                                <textarea required name="name" class="input is-primary is-rounded"  >  {{ $player->name }} </textarea>
                            </div>
                            <br>
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">National Team:</label> </b>
                            <div class="field">
                            <div class="control">
                                <textarea required name="national_team" class="input is-primary is-rounded" >{{ $player->national_team }}</textarea> 
                            </div>
                            <br>
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">Position:</label> </b>
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
                            </div>  -->
                            <br>
                            <b><label for="recipient-name" class="col-form-label">Clubs:</label></b>                            
                            <table class="table"> 
                                @foreach ($club as $logo)<td>  
                                    @if($logo->player_id == $player->id ) 
                                            <img src="{{url($logo->Club[0]->photo)}}" height=80 width=80/>   
                                                <br><b>Club : <i>{{ $logo->Club[0]->name }} </i>
                                                <br>Duration :<i> {{ $logo->duration }} </i>  </b>
                                            <a class="button is-info" >Update</a>  </td>
                                    @endif
                                <br>
                                @endforeach
                            </table>
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
 