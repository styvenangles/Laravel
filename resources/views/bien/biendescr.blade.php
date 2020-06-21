@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <?php
          $id_bien = $bien->id_bien;
          $dependances = $bien->dependance_bien;
          $dependance = NULL;
          if($dependances == 1){
            $dependance = 1;
          }
          else {
            $dependance = 'Aucune';
          }
        ?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('biencontroller.show', $bien->id_bien) }}" class="btn btn-link">
                  <strong>{{ $bien->titre_bien }}</strong></a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><ins>Description:</ins></h5>
                  <p class="card-text">{{  $bien->descr_bien }}</p>
                <div class="row">
                <div class="col-md-6">                
                  <h5 class="card-title"><ins>Details:</ins></h5>
                  <strong><p>Type de bien: {{ $bien->type_bien }}</p>
                          <p>Superficie: {{ $bien->superficie_bien }}m2</p>
                          <p>Nombre de pieces: {{ $bien->nbr_piece_bien }}</p> 
                          <p>Dependance: {{ $dependance }}</p> 
                          <p>Prix: {{ $bien->prix_bien }} Euro</p> 
                          <p>Frais agence: {{ $bien->frais_agence_bien }} Euro</p> 
                          <p>Region: {{  $bien->region_bien }}</p> 
                  </strong>                       
                    <a href="{{ route('usercontroller.show', $bien->id_vendeur) }}" class="btn btn-link"><strong>Informations sur le vendeur</strong></a>
                </div>
                <div class="col-md-6">  
                  <img class="card-img rounded mx-auto d-block" style="width:50%;" src="{{ $bien->image_bien }}"><br>
                 @auth
                  <?php
                    $id_user = Auth::user()->id;
                    $rank_user = Auth::user()->rank;
                    $data = [
                              'id_bien' => $id_bien,
                              'id_user' => $id_user,
                            ];
                  ?>
                  @if ($rank_user == "acheteur")      
                    <form action="{{ route('updatebien.store') }}" method="post">
                      @csrf
                        <input type="number" class="form-control sr-only" name="id_bien" value="{{ $id_bien }}"/><br>
                        <input type="number" class="form-control sr-only" name="id_user" value="{{ $id_user }}"/><br>
                        <button class="btn btn-success mx-auto d-block" value="modify">Mettre en Favoris</button>
                    </form>
                  @endif
                 @endauth
                </div>
                </div>
                </div>
                <div class="card-footer text-muted">
                  Mise en ligne le : {{ $bien->bien_parut_le }}
                </div>
              </div>
            </div>
    
 
    
 @endsection