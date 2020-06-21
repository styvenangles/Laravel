@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                      
                    Bienvenue, {{Auth::user()->name}}!
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br><br>
                    Informations :  
                    <br><br>
                    
                    <?php
                      $username = "Nom d'utilisateur";
                      $user = Auth::user()->get();
                      $user_id = Auth::user()->id;
                      $user_rank = Auth::user()->rank;
                      $biens = App\Bien::all()->where("id_vendeur", "=", $user_id);
                    ?>
                    
          <table class="table">
        <thead>
            <tr>
                <td><strong>{{ $username }}</strong></td>
                <td><strong>Prenom</strong></td>
                <td><strong>Nom</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Tel</strong></td>
                <td><strong>Date de Naissance</strong></td>
                <td><strong>Permission</strong></td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><a href="{{ route('skillsuser.show', $user_id) }}">{{Auth::user()->name}}</a></td>
                    <td>{{Auth::user()->lastname}}</td>
                    <td>{{Auth::user()->firstname}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td>{{Auth::user()->tel}}</td>
                    <td>{{Auth::user()->date_naissance}}</td>
                    <td>{{Auth::user()->rank}}</td>
                </tr>
        </tbody>
    </table>
    
    @if( $user_rank == 'vendeur' )
        <br><br>
        Vos biens en ventes :
        <br><br>
        <table class="table">
        <thead>
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Titre</strong></td>
                <td><strong>Description</strong></td>
                <td><strong>Type</strong></td>
                <td><strong>Region</strong></td>
                <td><strong>Prix</strong></td>
                <td><strong>Depuis</strong></td>
            </tr>
        </thead>        
        @foreach($biens as $bien)
        <?php
          $id_bien = $bien->id_bien;
        ?>
        <tbody>
                <tr>
                    <td><a href="{{ route('biencontroller.show', $bien->id_bien) }}">{{$bien->id_bien}}</a></td>
                    <td>{{$bien->titre_bien}}</td>
                    <td>{{$bien->descr_bien}}</td>
                    <td>{{$bien->type_bien}}</td>
                    <td>{{$bien->region_bien}}</td>
                    <td>{{$bien->prix_bien}}</td>
                    <td>{{$bien->bien_parut_le}}</td>
                    <td><a href="{{ route('updatebien.edit', $id_bien) }}">Modifier</a>
                    <form action="{{ route('biencontroller.destroy', $bien->id_bien) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                </tr>
        </tbody>       
        @endforeach
        
    </table>
    @endif
    
    @if( $user_rank == 'acheteur' )
        <br><br>
        Vos favoris :
        <br><br>
        <?php
        $favoris = App\Favori::all()->where("id_user", "=", $user_id);
        ?>
        <table class="table">
        <thead>
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Titre</strong></td>
                <td><strong>Description</strong></td>
                <td><strong>Type</strong></td>
                <td><strong>Region</strong></td>
                <td><strong>Prix</strong></td>
                <td><strong>Depuis</strong></td>
            </tr>
        </thead>       
        
        @foreach($favoris as $favori)
          <?php
            $id_bien_favori = $favori->id_bien;
            $biens = App\Bien::all()->where("id_bien", "=" , $id_bien_favori);
          ?>
          @foreach($biens as $bien)
            <?php
              $id_bien = $bien->id_bien;
            ?>
            <tbody>
                <tr>
                    <td><a href="{{ route('biencontroller.show', $bien->id_bien) }}">{{$bien->id_bien}}</a></td>
                    <td>{{$bien->titre_bien}}</td>
                    <td>{{$bien->descr_bien}}</td>
                    <td>{{$bien->type_bien}}</td>
                    <td>{{$bien->region_bien}}</td>
                    <td>{{$bien->prix_bien}}</td>
                    <td>{{$bien->bien_parut_le}}</td>
                    <td>
                    <form action="{{ route('updatebien.destroy', $bien->id_bien) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                </tr>
        </tbody>       
        @endforeach
        @endforeach
        
    </table>
    @endif
                </div>
            </div>
        </div>
        
</div>
@endsection
