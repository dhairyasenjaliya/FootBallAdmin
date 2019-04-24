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
                                <textarea required name="name" class="input is-primary"  >  {{ $player->name }} </textarea>
                            </div>
                            <br>
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">National Team:</label> </b>
                            <div class="field">
                            <div class="control">
                                <textarea required name="national_team" class="input is-primary " >{{ $player->national_team }}</textarea> 
                            </div>
                            <br>
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">Position:</label> </b>
                            <div class="field">
                            <div class="control">
                                <input required name="position" class="input is-primary " type="text" value={{ $player->position }}>  
                            </div>
                            <br>
 
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">Hint:</label> </b>
                            <div class="field">
                            <div class="control">
                                <textarea name="hint" class="textarea is-primary " type="text" >{{ $player->hint }}</textarea>  
                            </div>
                            <br>

                            <b><label for="recipient-name" class="col-form-label">Answer:</label></b>
                            <select  class="form-control" name="answer"  >
                                <option value="{{ $player->answer }} "selected  > {{ $player->answer }}</option>
                                <option value="True"> True</option>
                                <option value="False">False</option>
                            </select>
                            <br><br>
                            
                            <b><label for="recipient-name" class="col-form-label">Difficulty Level:</label></b> 

                            <select id="p" name="difficulty" > 
                                <option value="{{ $player->difficulty }}" selected  > {{ $player->difficulty }} </option>
                                <option value="Easy"> Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard" >Hard</option>
                            </select>
                            <br><br>

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
 