<div class="w-full lg:max-w-full lg:flex mb-6 lg:mr-4 dark:shadow-2xl relative">
    <div class="relative lg:w-3/12 h-48 lg:h-auto bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l" style="background-image: url('{{$post->image}}')" title="{{ $post->title }}">
        @php

            use Laravelista\Comments\Comment;use Laravelista\Comments\CommentController;
            $comment = Comment::where('commentable_id', $post->id)->get();

            $comments_count = $comment->count();

        @endphp
        <div class="absolute bottom-0 right-0 bg-blue-200 text-gray-800 py-1 px-2 rounded-tl shadow-inner">
            {{ $comments_count }}
        </div>
    </div>
    <div class="lg:w-9/12 dark:bg-gray-800 bg-white border border-blue-100 rounded-r lg:justify-between leading-normal">
        <div class="p-4 relative">
            <a href="{{ route('post.show', [$post->id, $post->slug]) }}" class="absolute w-full h-full"></a>
            <p class="dark:text-gray-400 text-gray-900 text-2xl">{{ $post->title }}</p>
            <p class="text-gray-700 dark:text-gray-500 truncate mt-2">{{ $post->description }}</p>
        </div>
        <div class="p-4 flex items-center">
            <div class="text-sm flex-1">
                <a class="bg-gray-200 text-gray-800 py-1 px-2 rounded-lg" href="{{ route('subcategory', \App\Subcategory::find($post->subcategory_id)) }}" class="text-gray-600">{{ \App\Subcategory::find($post->subcategory_id)->title }}</a>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\App\User::isAdmin())
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-green mr-2">Modifier</a>
                    <form action="{{ route('admin.post.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" type="submit">Supprimer</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>
