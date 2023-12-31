@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row g-4">
        <button type="button" class="btn btn-warning">
            <a href="{{route("fumetti.create")}}">Aggiungi un fumetto</a>
        </button>

        <div class="col d-flex flex-wrap">
            @foreach ($fumetti as $fumetto)
            <div class="card m-3 " style="width: 18rem;">

                <div class="card-body">
                  <h5 class="card-title">{{$fumetto ->title}}</h5>
                 <a href="{{route("fumetti.show", $fumetto->id)}}"><img src="{{$fumetto ->thumb}}" alt="{{$fumetto ->title}}"></a> 
                  
                  <p class="card-text">Descrizione: {{$fumetto ->description}}</p>
                  <p class="card-text">Prezzo: {{$fumetto ->price}}</p>
                  <p class="card-text">Tipo: {{$fumetto ->type}}</p>
                  <p class="card-text">Data: {{$fumetto ->sale_date}}</p>
                  <p class="card-text">Series: {{$fumetto ->series}}</p>
        
                </div>
            </div>
                
            @endforeach
        </div>
       
    </div>

</div>
@endsection