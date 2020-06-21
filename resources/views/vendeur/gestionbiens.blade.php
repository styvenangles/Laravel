@extends('layouts.app')

@section('title', 'Skill Table')

@section('content')

  <div class="container">
    <div class="row">
    <div class="col-md-4">
    <form method="post" class="form" action="{{ route('skills.store') }}">
      @csrf
      <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" class="form-control" name="name"/>
          <label for="description">Description :</label>
          <input type="text" class="form-control" name="description"/>
          <label for="logo">Logo :</label>
          <input type="text" class="form-control" name="logo"/>
      </div>
      <button type="submit" name="action" class="btn btn-secondary" value="validate">Valider</button>
    </form>
    </div>
    
    <div class="col-md-8">
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Description</td>
                <td>Logo</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
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