@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row g-4">

        {{-- bottone torna alla hone. --}}
        <button type="button" class="btn btn-warning">
            <a href="{{route("fumetti.index")}}">torna alla home</a>
        </button>

        @if ($errors-> any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif

        <form action="{{route('fumetti.store')}}" method="POST" class="needs-validation">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Spiderman" value="{{old("title")}}">
                @error("title")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Percorso Immagine Fumetto</label>
                <input type="text" class="form-control  @error('thumb') in-invalid @enderror " id="thumb" name="thumb"  >
                @error("thumb")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Fumetto</label>
                <textarea class="form-control @error('description') in-invalid @enderror" id="description" name="description" rows="3"></textarea>
                {{-- <input type="text" class="form-control" id="description" name="description" rows="5" > --}}
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type">Tipo Fumetto</label>
                <select name="type" id="type">
                    <option value="selected">Seleziona un tipo</option>
                    <option value="comic book">Comic Book</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo Fumetto</label>
                <input type="text" class="form-control  @error('price') in-invalid @enderror" id="price" name="price" placeholder="3.22">

                @error("price")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data</label>
                <input type="date" class="form-control  @error('sale_date') in-invalid @enderror" id="sale_date" name="sale_date">

                @error("sale_date")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <input type="submit" value="invia">

        </form>

        
       
    </div>

</div>
@endsection