@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Modifier le post n°{{ $post->id }}</h1>
    <form action="{{ route('admin.post.update', $post->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="titre">Titre</label>
        <input type="text" class="input" id="titre" name="title" value="{{ $post->title }}">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="input mb-3">{{ $post->description }}</textarea>
        <button type="submit" class="btn btn-blue btn-block">Modifier le post</button>
    </form>
@endsection
