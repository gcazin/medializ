@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl py-4 text-center">Liste des articles publiées</h1>

    @foreach(\App\Post::all() as $post)
        @include('partial.media')
    @endforeach
@endsection
