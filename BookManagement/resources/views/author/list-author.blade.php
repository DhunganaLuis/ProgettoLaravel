@extends('layout.main')
@section('title')
    Lista Autori
@endsection
@section('add-button')
    <a href="{{route('author.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un'Autore</a>
@endsection
@section('header-title')
    <h2 class="mt-5 mb-4">Gli Autori</h2>
@endsection
@section('main-content')
    <div class="col-md-6">

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">Id</th>
                <th scope="col" class="w-50">Autore</th>
                <th scope="col" class="w-25">Data di nascita</th>
                <th scope="col" class="w-auto text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @forelse($authors as $author)
                <tr>
                    <td class="align-middle">{{$author->id}}</td>
                    <td class="align-middle">{{$author->name}}</td>
                    <td class="align-middle">{{$author->birthday}}</td>
                    <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('author.edit', $author->id)}}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            <form method="post" action="{{route('author.destroy',$author->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                Non sono presenti autori
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

