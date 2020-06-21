@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
  <?php
  ?>
    <div class="row">
    <div id="modify" class="col-md-12">
    <form method="post" class="form" action="{{ route('skillsuser.update', $user->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <div class="row">
        <div class="col-md-6">
          <label for="id">Id :</label>
          <input type="text" class="form-control" name="id" value="{{ $user->id }}" readonly/><br>
          
          <label for="name">Pseudo :</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}" /><br>
          
          <label for="firstname">Prenom :</label>
          <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" /><br>
          
          <label for="lastname">Nom :</label>
          <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" /><br>
        </div>
        
        <div class="col-md-6">
          <label for="email">Email :</label>
          <input type="text" class="form-control" name="email" value="{{ $user->email }}" required/><br>
          
          <label for="tel">Tel :</label>
          <input type="text" class="form-control" name="tel" value="{{ $user->tel }}" required/><br>
          
          <label for="date_naissance">Date de Naissance :</label>
          <input type="date" class="form-control" name="date_naissance" value="{{ $user->date_naissance }}" required/><br>
          
          <label for="rank">Permission :</label>
          <input type="text" class="form-control" name="rank" value="{{ $user->rank }}" readonly/><br>
        </div>
        </div>
      </div>
      <button type="submit" name="action" class="btn btn-secondary float-right" value="modify">Modifier</button>
    </form>
      <button type="submit" name="action" class="btn btn-secondary float-left" value="return" onclick="history.go(-1);">Retour</button>
    </div>
    </div>    
  </div>
@endsection