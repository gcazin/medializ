@extends('layouts.base')


@section('content')
    <h1 class="text-xl pb-4 pt-2 sm:text-center lg:text-left">Catégorie {{ \App\Subcategory::find(request()->segment(count(request()->segments())))->title }}</h1>

    <div class="flex">
        @php
            $posts = $posts->all();
        @endphp
        <div class="flex flex-wrap flex-col align-items-center justify-content-center mb-3 w-9/12">
            @foreach($posts as $post)
                @include('partials.item')
            @endforeach
        </div>
        <div class="w-3/12 ml-5">
            <div class="box">
                <h3 class="px-3 py-2 bg-gray-200 rounded-t text-gray-800 text-xl">Catégories</h3>
                <ul class="bg-white rounded-b">
                    <li class="px-3 py-2 text-gray-700 border-gray-100 border-b">
                        <a href="{{ route('post.index') }}">Tous</a>
                    </li>
                    @php

                    $id = \App\Subcategory::find(request()->segment(count(request()->segments())))->id;

                    @endphp
                    @foreach(\App\Subcategory::all() as $subcategorie)
                        <li class="px-3 py-2 text-gray-700 border-gray-100 border-b {{ ($id == $subcategorie->id) ? 'bg-blue-100' : null }}">
                            <a href="{{ route('subcategory', $subcategorie->id) }}">{{ $subcategorie->title }}</a>
                            <span style="line-height: 20px;height: 20px; width: 20px" class="rounded-full text-sm bg-gray-200 float-right text-center">
                                @php

                                    $count = \App\Post::where('subcategory_id', $subcategorie->id)->get();

                                @endphp
                                {{ $count->count() }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection



