@extends('layouts.base')

@section('content')
    <h1 class="text-3xl text-center font-bold">En construction</h1>
    @php
        $posts = \App\Post::all();
    @endphp
@endsection
