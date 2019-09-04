@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Mettre à jour le post "{{ $post->title }}"</h1>

    {!! form($form) !!}
@endsection
