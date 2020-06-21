@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
  <?php
    $regions = App\RegionBien::all();
  ?>
    <div class="row">
    <div id="modify" class="col-md-12">
    <form method="post" class="form" action="{{ route('agencecontroller.update', $agence->id_agence) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <div class="row">
        <div class="col-md-6">
          <label for="name">Id :</label>
          <input type="text" class="form-control" name="id" value="{{ $agence->id_agence }}" readonly/><br>
          <label for="name">Nom :</label>
          <input type="text" class="form-control" name="name" value="{{ $agence->nom_agence }}" readonly/><br>
          <label for="description">Email :</label>
          <input type="text" class="form-control" name="email" value="{{ $agence->email_agence }}" required/><br>
        </div>
        <div class="col-md-6">
          <label for="logo">Telephone :</label>
          <input type="text" class="form-control" name="tel" value="{{ $agence->tel_agence }}" required/><br>
          
          <label for="logo">Nombre d'agents :</label>
          <input type="number" class="form-control" name="agent" value="{{ $agence->nbr_agent_agence }}" required/><br>
          
          <label for="logo">Region :</label>
            <select id="region" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" autocomplete="region" autofocus>
              <option>{{ $agence->region_agence }}</option>  
              @foreach($regions as $region)
                <option>{{ $region->nom_region }}</option>                
              @endforeach
            </select>
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