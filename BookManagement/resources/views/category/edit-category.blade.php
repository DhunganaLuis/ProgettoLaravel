@extends('layout.main')
@section('title')
    Modifica una Categoria
@endsection
@section('header-title')
    <h2 class="mt-5 mb-4">Modifica {{$category->name}}</h2>
@endsection
@section('main-content')
    <div class="col-md-5">
        <form action="{{route('category.update',$category->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" name="name" id="title" placeholder="Romanzo, Saggio,..." value="{{$category->name}}">
                <label for="title">Nome della Categoria</label>
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Modifica la categoria</button>
                <a href="{{route('category.index')}}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection

