@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-4">
    <?php
    ?>
    <form method="post" class="form" action="{{ route('skillsuser.update', $skills->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
      
          <label for="user_id">Votre ID :</label>
          
          <input type="text" class="form-control" name="user_id" readonly/>
      
          <label for="skill">Competence :</label>
          
          <select class="form-control" name="skill">
            <option>--Choisissez son nom--</option>
            @foreach ($skills as $skill)
              <option value="{{$skill->id}}">{{$skill->name}}</option>
            @endforeach
          </select>
            
          <label for="level">Niveau :</label>
          
          <select class="form-control" name="level">
            <option>--Choisissez son niveau--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          
      </div>
      <button type="submit" name="action" class="btn btn-secondary">Ajouter</button>
      <button type="submit" name="action" class="btn btn-secondary float-right">Supprimer</button>
    </form><br>
    <button type="submit" name="action" class="btn btn-secondary float-left" value="return" onclick="location.href = '/home';">Retour</button>
    </div>
    </div>    
  </div>
@endsection