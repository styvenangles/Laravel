@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
    <div class="row">
    <div id="modify" class="col-md-4">
    <form method="post" class="form" action="{{ route('skills.update', $skill->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" class="form-control" name="name"/>
          <label for="description">Description :</label>
          <input type="text" class="form-control" name="description"/>
          <label for="logo">Logo :</label>
          <input type="text" class="form-control" name="logo"/>
      </div>
      <button type="submit" name="action" class="btn btn-secondary float-left" value="modify">Modifier</button>
    </form>
      <button type="submit" name="action" class="btn btn-secondary float-right" value="return" onclick="history.go(-1);">Retour</button>
    </div>
    </div>    
  </div>
@endsection