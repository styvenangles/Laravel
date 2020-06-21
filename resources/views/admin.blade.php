@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                      
                    <?php
                      $users = Auth::user()->get();
                    ?>
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    
                    Voici les utilisateurs enregistres:  
                    <br><br>
        
          <table class="table">
        <thead>
            <tr>
                <td>Nom d'utilisateur</td>
                <td>Prenom</td>
                <td>Nom</td>
                <td>Permission</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{ route('skillsuser.show', $user->id) }}">{{$user->name}}</a></td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->rank}}</td>
                    <td><a href="{{ route('ranksuser.edit', $user->id) }}">Modifier</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

 @endsection