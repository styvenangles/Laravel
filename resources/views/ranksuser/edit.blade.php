@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
    <div class="row">
    <div id="modify" class="col-md-4">
    <form method="post" class="form" action="{{ route('ranksuser.update', $rank->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="rank" id="exampleRadios1" value="admin" checked>
            <label class="form-check-label" for="exampleRadios1">
              Administrateur
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="rank" id="exampleRadios2" value="acheteur">
            <label class="form-check-label" for="exampleRadios2">
              Acheteur
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="rank" id="exampleRadios2" value="vendeur">
            <label class="form-check-label" for="exampleRadios3">
              Vendeur
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="rank" id="exampleRadios2" value="agent">
            <label class="form-check-label" for="exampleRadios4">
              Agent Immobilier
            </label>
          </div>
      </div>
      <button type="submit" name="action" class="btn btn-secondary float-left" value="modify">Modifier</button>
    </form>
      <button type="submit" name="action" class="btn btn-secondary float-right" value="return" onclick="history.go(-1);">Retour</button>
    </div>
    </div>    
  </div>
@endsection