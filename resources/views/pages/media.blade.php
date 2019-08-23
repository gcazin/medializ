@extends('layouts.app')

@section('content')
    @php
    $posts = \App\Post::all();
    @endphp
    <h1 class="text-xl pb-4 pt-2 sm:text-center lg:text-left">Les dernières vidéos Youtube publiées</h1>
    <div class="flex flex-wrap lg:flex-col align-items-center justify-content-center mb-3">
    @foreach($posts as $post)
    @include('partials.media')
    @endforeach
    </div>
@endsection
