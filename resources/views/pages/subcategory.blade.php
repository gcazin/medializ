@extends('layouts.app')

@section('content')
    @php
        $posts = $post->all();
    @endphp
    <h1 class="text-2xl mb-2">Catégorie {{ \App\Subcategory::find(request()->segment(count(request()->segments())))->title }}</h1>
    @foreach($posts as $post)
        @include('partial.media')
    @endforeach
@endsection


