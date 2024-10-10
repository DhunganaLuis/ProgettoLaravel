@extends('layout.main')
@section('title')
    Lista Autori
@endsection
@section('add-button')
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi una Categoria</a>
@endsection
@section('header-title')
    <h2 class="mt-5 mb-4">Le Categorie</h2>
@endsection
@section('main-content')
    <div class="col-md-6">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">Id</th>
                <th scope="col" class="w-75">Categoria</th>
                <th scope="col" class="w-auto text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td class="align-middle">{{$category->id}}</td>
                    <td class="align-middle">{{$category->name}}</td>
                    <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('category.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                Non ci sono categoria al momento
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

