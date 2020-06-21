@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
  <?php
    $regions = App\RegionBien::all();
    $types = App\TypeBien::all();
  ?>
    <div class="row">
    <div id="modify" class="col-md-12">
    <form method="post" class="form" action="{{ route('updatebien.update', $bien->id_bien) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <div class="row">
        <div class="col-md-6">
          
          <label for="titre">Titre du bien :</label>
          <input type="text" class="form-control" name="titre" value="{{ $bien->titre_bien }}" required/><br>
          
          <label for="description">Description :</label>
          <input type="text" class="form-control" name="description" value="{{ $bien->descr_bien }}" required/><br>
          
          <label for="image">Photo :</label>
          <div class="custom-file">
          <input type="file" class="form-control custom-file-input" name="image" value="{{ old('image') }}" required/>
          <label class="form-control custom-file-label" for="image">Choose file</label><br>
          </div>
        
          <label for="type">Type :</label>
          <select id="type" class="form-control" name="type" value="{{ $bien->type_bien }}" required>
            @foreach($types as $type)
              <option>{{ $type->nom_type }}</option>                
            @endforeach
          </select><br>
          
          <label for="region">Region :</label>
          <select id="region" class="form-control" name="region" value="{{ $bien->region_bien }}" required>
            @foreach($regions as $region)
              <option>{{ $region->nom_region }}</option>                
            @endforeach
          </select><br>
        </div>
        
        <div class="col-md-6">
          <label for="superficie">Superficie :</label>
          <input type="number" class="form-control" name="superficie" value="{{ $bien->superficie_bien }}" required/><br>
          
          <label for="nbr_piece">Nombre de pieces :</label>
          <input type="number" class="form-control" name="nbr_piece" value="{{ $bien->nbr_piece_bien }}" required/><br>
          
          <label for="dependance">Dependance :</label>
          <select id="dependance" class="form-control" name="dependance" value="{{ $bien->dependance_bien }}" required>
              <option>Oui</option>
              <option>Non</option>
          </select><br>
          
          <label for="prix">Prix :</label>
          <input type="number" class="form-control" name="prix" value="{{ $bien->prix_bien }}" required/><br>
          
          <label for="frais">Frais d'agence :</label>
          <input type="number" class="form-control" name="frais" value="{{ $bien->frais_agence_bien }}" required/><br>
        </div>
        </div>
          <label for="id_vendeur">ID du bien :</label>
          <input type="number" class="form-control" name="id_vendeur" value="{{ $bien->id_bien }}" readonly/><br>
      </div>
      <button type="submit" name="action" class="btn btn-secondary float-right" value="modify">Modifier</button>
    </form>
      <button type="submit" name="action" class="btn btn-secondary float-left" value="return" onclick="history.go(-1);">Retour</button>
    </div>
    </div>    
  </div>
@endsection