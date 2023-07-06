@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row g-4">

        {{-- bottone torna alla hone. --}}
        <button type="button" class="btn btn-warning">
            <a href="{{route("fumetti.index")}}">torna alla home</a>
        </button>

        <form action="{{route("fumetti.update", $fumetti->id )}}" method="POST">
            @csrf

            @method("PUT")

            <div class="mb-3">
                <label for="title" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control" id="title" name="title"  value="{{$fumetti->title}}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Percorso Immagine Fumetto</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{$fumetti->thumb}}" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Fumetto</label>
                <textarea class="form-control" id="description" name="description" rows="3" value="{{$fumetti->description}}" ></textarea>
                {{-- <input type="text" class="form-control" id="description" name="description" rows="3" value="{{$fumetto->description}}"> --}}
            </div>

            <div class="mb-3">
                <label for="type">Tipo Fumetto</label>
                <select name="type" id="type">
                    <option value="selected">Seleziona un tipo</option>
                    <option value="{{$fumetti->type}}">Comic Book</option>
                </select>

            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo Fumetto</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="3.22" value="{{$fumetti->price}}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Data</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{$fumetti->sale_date}}">
            </div>

            <input type="submit" value="invia">

        </form>

        
       
    </div>

</div>
@endsection