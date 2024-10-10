@extends('layout.main')
@section('title')
    Modifica un Autore
@endsection
@section('header-title')
    <h2 class="mt-5 mb-4">Modifica {{$author->name}}</h2>
@endsection
@section('main-content')
    <div class="col-md-5">
        <form action="{{route('author.update',$author->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 form-floating">
                <input type="text" name="name" class="form-control" id="title" placeholder="Umberto Eco" value="{{$author->name}}">
                <label for="title">Nome e Cognome</label>
            </div>
            <div class="mb-3 form-floating birthday_width">
                <input type="date" class="form-control" name="birthday" id="title" placeholder="Umberto Eco" value="{{$author->birthday}}">
                <label for="title">Data di Nascita (opzionale)</label>

            </div>

            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Modifica l'Autore</button>
                <a href="{{route('author.index')}}"
                   class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection
