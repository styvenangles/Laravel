@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $skillinfo->logo }} {{ $skillinfo->name }}</div>

                <div class="card-body">
                    COUNT : {{ $users }}<br>AVG : {{ $lvlavg }}
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
                    <br><br>
                    Utilisateurs possedant la competence :  
                    <br><br>
                    
          <table class="table">
        <thead>
            <tr>
                <td>Nom d'utilisateur</td>
                <td>Competence</td>
                <td>Niveau</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $userids }}</td>
                    <td></td>
                    <td></td>
                </tr>
        </tbody>
    </table>
        
    </div>
</div>
@endsection
