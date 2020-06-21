@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php
        ?>      
        @if(!$biens->isEmpty())
            @foreach($biens as $bien)  
                <br>
                <hr>
                <br>
                <div class="card">
                  <div class="card-header">
                  <a href="{{ route('biencontroller.show', $bien->id_bien) }}" class="btn btn-link">
                    <ins><strong>{{ $bien->titre_bien }}</strong></ins></a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><ins>{{ $bien->type_bien }}</ins>, <ins>{{  $bien->region_bien }}</ins></h5>
                    <p class="card-text">{{  $bien->descr_bien }}</p>
                  </div>
                  <div class="card-footer text-muted">
                    Mise en ligne le : {{ $bien->bien_parut_le }}
                  </div>
                </div>
            @endforeach
        @else
          <hr>
          <div class="h4 text-center">
            Aucun biens trouves selon vos criteres.
          </div>
          <hr>
        @endif
            
        </div>
    </div>
</div>
@endsection
