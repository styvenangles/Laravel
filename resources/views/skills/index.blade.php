@extends('layouts.app')

@section('title', 'Agence Table')

@section('content')

  <div class="container">
    <div class="row">
    
    <div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Email</td>
                <td>Telephone</td>
                <td>Nombre d'agents</td>
                <td>Région</td>
            </tr>
        </thead>
        <tbody>
            @foreach($agences as $agence)
                <tr>
                    <td>{{$skill->id}}</td>
                    <td>{{$skill->name}}</td>
                    <td>{{$skill->description}}</td>
                    <td>{{$skill->logo}}</td>
                    <td><a href="{{ route('skills.edit', $skill->id) }}">Modifier</a>
                    <form action="{{ route('skills.destroy', $skill->id) }}" method="post">
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