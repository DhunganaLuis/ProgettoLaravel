@extends('layout.main')
@section('title')
    Modifica un Libro
@endsection
@section('header-title')
    <h2 class="mt-5 mb-4">Modifica {{$book->title}}</h2>
@endsection
@section('main-content')
    <div class="col-md-5">
        <form action="{{route('book.update',$book->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="title" name="title" placeholder="Il nome della Rosa" value="{{$book->title}}">
                <label for="title">Titolo</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control textarea-height" name="description" placeholder="Inserisci la descrizione" id="description" >{{$book->description}}</textarea>
                <label for="description">Descrizione (opzionale)</label>
            </div>
            <div class="mb-3 form-floating nr_pages_width">
                <input type="number" name="pages" class="form-control" id="pages" placeholder="10" value="{{$book->pages}}">
                <label for="pages">N° Pagine (opzionale)</label>
            </div>
            <div class="mb-3 form-floating">
                <select class="form-select" name="author_id" aria-label="Default select example" id="author">
                    <option selected>Seleziona l'Autore</option>
                    @forelse($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $book->author->id ? 'selected' : '' }}>{{$author->name}}</option>
                    @empty
                        <option selected>Non sono presenti autori</option>
                    @endforelse
                </select>
                <label for="author">Autore</label>
            </div>
            <div class="mb-4 form-floating">
                <select class="form-select" name="category_id" aria-label="Default select example" id="category">
                    <option selected>Seleziona la Categoria</option>
                    @forelse($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $book->category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @empty
                        <option selected>Non sono presenti autori</option>
                    @endforelse
                </select>
                <label for="category">Categoria</label>
            </div>
            <div class="mb-3 form-floating">
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Copertina Libro">
                <label for="cover_image">Copertina del Libro (opzionale)</label>
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Modifica il Libro</button>
                <a href="{{route('book.index')}}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection

