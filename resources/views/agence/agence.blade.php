@extends('layouts.app')

@section('title', 'Agence Table')

@section('content')

  <div class="container">
    <div class="row">
    
    <div class="col-md-12">
    <h5><strong>Agences repertoriees : </strong></h5><br>
    <table class="table">
        <thead>
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Nom</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Telephone</strong></td>
                <td><strong>Nombre d'agents</strong></td>
                <td><strong>Region</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach($agences as $agence)
                <tr>
                    <td>{{$agence->id_agence}}</td>
                    <td>{{$agence->nom_agence}}</td>
                    <td>{{$agence->email_agence}}</td>
                    <td>{{$agence->tel_agence}}</td>
                    <td>{{$agence->nbr_agent_agence}}</td>
                    <td>{{$agence->region_agence}}</td>
                    <td><a href="{{ route('agencecontroller.edit', $agence->id_agence) }}">Modifier</a>
                    <form action="{{ route('agencecontroller.destroy', $agence->id_agence) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>    
  </div>
@endsection