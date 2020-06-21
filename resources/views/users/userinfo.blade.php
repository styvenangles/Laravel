@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
        
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br><br>
                    Informations :  
                    <br><br>
                    
                    <?php
                    ?>
                    
          <table class="table">
        <thead>
            <tr>
                <td>Nom d'utilisateur</td>
                <td>Biographie</td>
                <td>Email</td>
                <td>Rang</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->bio}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->rank}}</td>
                </tr>
        </tbody>
    </table>
        
    </div>
</div>
@endsection
