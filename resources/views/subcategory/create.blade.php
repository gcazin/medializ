@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Créer un post</h1>

    <form action="{{ route('admin.subcategory.store') }}" method="post">
        @csrf
        @method('POST')
        <label for="title">Titre de la sous-catégorie</label>
        <input name="title" type="text" class="input" placeholder="Titre de la sous-catégorie">
        <label for="description">Description de la sous-catégorie</label>
        <textarea name="description" class="input" placeholder="Description de la sous-catégorie"></textarea>
        <button type="submit" class="btn btn-blue float-right">Créer la sous-catégorie</button>
    </form>
@endsection
