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
                    <br><br>
                    <form method="post" enctype="multipart/form-data" action="{{ route('crud.store') }}">
                        @method('POST')
                        @csrf
                          <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">Player Name:</label> </b>
                            <div class="field">
                            <div class="control">
                                <input required name="name" class="input is-primary is-rounded" type="text"  >  
                            </div>
                            <br>
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">National Team:</label> </b>
                            <div class="field">
                            <div class="control">
                                <input required name="national_team" class="input is-primary is-rounded" type="text"  >  
                            </div>
                            <br>
                            <div class="form-group">
                          <b><label for="recipient-name" class="col-form-label">Position:</label> </b>
                            <div class="field">
                            <div class="control">
                                <input required name="position" class="input is-primary is-rounded" type="text"  >  
                            </div>

                            <br>
                            <div class="form-group">
                            <b><label for="recipient-name" class="col-form-label">Hint's:</label> </b> 
                            <div class="field">
                            <div class="control"> 
                                <textarea name="hint" class="input is-primary is-rounded">  </textarea>
                            </div>
                            </div></div>
                            <br>

                            <br>
                            <b><label for="recipient-name" class="col-form-label">Answer :</label></b>
                            <br>  
                            
                            <select id="p" name="answer" > 
                                <option value="True">True</option> 
                                <option value="False">False</option>  
                            </select>
                            
                            <br>
                            <b><label for="recipient-name" class="col-form-label">Difficulty Level:</label></b>
                            <br>  
                            
                            <select id="p" name="difficulty" > 
                                <option value="Easy">Easy</option> 
                                <option value="Medium">Medium</option> 
                                <option value="Hard">Hard</option>  
                            </select>
                            
                            <br>
                            <b><label for="recipient-name" class="col-form-label">Clubs:</label></b>
                            <br>  
                            
                            <select id="p" name="clubs" >
                            @php ($data = [])
                            @foreach($club as $clubs) 
                                <option value="{{ $clubs->name }}">{{ $clubs->name }} </option> 
                                    @php ($data[] = $clubs->name) 
                            @endforeach   
                            
                            <input required name="duration" class="input is-primary is-rounded" type="text"  placeholder="Enter Duration">
                            </select>  
 
                        <br><br>
                        <button type="submit" class="button is-success">Add</button> 
                        <a href="{{route('player') }}" class="button is-danger">Cancel</a>
                    </form>
  
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
  