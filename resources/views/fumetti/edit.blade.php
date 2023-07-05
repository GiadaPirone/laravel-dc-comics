@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row g-4">

        {{-- bottone torna alla hone. --}}
        {{-- <button type="button" class="btn btn-warning">
            <a href="{{route("fumetti.index")}}">torna alla home</a>
        </button> --}}

        <form action="{{route("fumetti.update", $fumetto->id )}}" method="POST">
            @csrf

            @method("PUT")

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Spiderman" value="{{$fumetto->title}}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrizione Fumetto</label>
                <textarea class="form-control" id="description" name="description" rows="3" value="{{$fumetto->description}}" ></textarea>
                {{-- <input type="text" class="form-control" id="description" name="description" rows="3" value="{{$fumetto->description}}"> --}}
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Prezzo Fumetto</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="3.22" value="{{$fumetto->price}}">
            </div>

            <input type="submit" value="invia">

        </form>

        
       
    </div>

</div>
@endsection