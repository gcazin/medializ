@extends('layouts.base')

@section('content')
    @php
        $posts = $post->all();
    @endphp
    <h1 class="text-xl mb-2">Catégorie {{ \App\Subcategory::find(request()->segment(count(request()->segments())))->title }}</h1>
    @foreach($posts as $post)
        @include('item.blade.php')
    @endforeach
@endsection


