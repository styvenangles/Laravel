@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
      <?php
        $biens = App\Bien::paginate(5);
        $types = App\TypeBien::all();
        $regions = App\RegionBien::all();
      ?>
    
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="GET" action="{{ route('biencontroller.create') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="nom_bien" type="text" class="form-control @error('nom_bien') is-invalid @enderror" placeholder="Recherchez ce que vous desirez ici!" name="nom_bien" value="{{ old('nom_bien') }}" autocomplete="nom_bien" autofocus>

                                @error('nom_bien')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                
                
                            <div class="col-md-3">
                        
                          <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" autocomplete="type" autofocus>
                              <option>--Choisissez un type--</option>
                            @foreach($types as $type)
                              <option>{{ $type->nom_type }}</option>                
                            @endforeach
                          </select>
                        
                        @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>
                            
                      
                        <div class="col-md-3">
                        
                          <select id="region" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" autocomplete="region" autofocus>
                              <option>--Choisissez une region--</option>
                            @foreach($regions as $region)
                              <option>{{ $region->nom_region }}</option>                
                            @endforeach
                          </select>
                        
                        @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>
                      </div>
                      
                        <div class="form-group row mb-0">
                            <div class="offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Rechercher') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
          
          @foreach($biens as $bien)
              <br>
              <hr>
              <br>
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('biencontroller.show', $bien->id_bien) }}" class="btn btn-link">
                  <strong>{{ $bien->titre_bien }}</strong></a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><strong>{{ $bien->type_bien }}</strong>, <strong>{{  $bien->region_bien }}</strong></h5>
                  <p class="card-text">{{  $bien->descr_bien }}</p>
                </div>
                <div class="card-footer text-muted">
                  Mise en ligne le : {{ $bien->bien_parut_le }}
                </div>
              </div>
            @endforeach
          
        </div>
    </div>
</div><br>
    <div class="container">
      <div class="row justify-content-center">
        <div>
          {{ $biens->links() }}
        </div>
      </div>
    </div>
@endsection
