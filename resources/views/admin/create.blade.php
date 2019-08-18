@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl py-4 text-center">Créer un post</h1>

    <form method="POST" action="{{ route('admin.store') }}">
        @csrf
        @php
            $posts = \App\Category::all();
            $subcategories = \App\Subcategory::all();
        @endphp
        <label for="category">Categorie</label>
        <select name="category_id" class="input" id="category">
            @foreach($posts as $post)
                <option value="{{ $post->id }}">{{ $post->name }}</option>
            @endforeach
        </select>
        <label for="subcategory">Sous catégorie</label>
        <select name="subcategory_id" class="input" id="subcategory">
            @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
            @endforeach
        </select>
        <label for="youtube_url">{{ __('URL') }}</label>
        <input id="youtube_url" type="text" class="input" name="youtube_url" value="{{ old('name') }}" required autofocus>

        <label for="title">{{ __('Titre') }}</label>
        <input id="title" type="text" class="input" name="title" value="{{ old('title') }}" required>

        <label for="description">{{ __('Description') }}</label>
        <textarea id="description" type="text" class="input" name="description" required autocomplete="new-password"></textarea>

        <div class="text-right">
            <button type="submit" class="btn btn-green mt-2">
                {{ __('Publier') }}
            </button>
        </div>
    </form>
@endsection
