@extends('layout.main')
@section('title')
    I miei Libri
@endsection
@section('add-button')
    <a href="{{route('book.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un Libro</a>
@endsection
@section('header-title')
    <h2 class="mt-5 mb-4">I miei Libri</h2>
@endsection
@section('main-content')
    <section class="row">
        <div class="col-md-12">
            <div class="list-book">
            @forelse($books as $book)
                    <article class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title">{{$book->title}}</h3>
                            <div>di {{$book->author->name}}</div>
                            <div class="mt-2"><span class="badge text-bg-secondary">{{$book->category->name}}</span></div>
                            <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                                <a href="{{route('book.show',$book->id)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                <a href="{{route('book.edit',$book->id)}}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                                <form method="post" action="{{route('book.destroy',$book->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-light"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </div>
                    </article>
    @empty
        Non sono presenti libri
    @endforelse
                <section class="row">
                    <div class="col-md-12">
                        <div class="list-book">

@endsection


