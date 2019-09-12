@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
    <div id="comment-{{ $comment->id }}" class="media w-11/12 ml-auto">
        @else
            <div id="comment-{{ $comment->id }}" class="media">
                @endif
                <div class="bg-gray-100 dark:bg-gray-900 shadow py-3 rounded mb-3">
                    <div class="flex">
                        <div class="w-1/12 flex items-center justify-center">
                            <img class="shadow-lg h-10 rounded-full" src="/storage/avatars/{{ $comment->commenter->avatar }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
                        </div>
                        <div class="w-11/12">
                            <h5 class="block mt-0 mb-1 text-gray-600">{{ $comment->commenter->name ?? $comment->guest_name }}</h5>
                            <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>
                        </div>
                    </div>

                    <div class="flex mt-4 pl-5 pr-3">
                        <div class="w-8/12 flex items-center">
                            <small class="text-muted"><i class="far fa-clock mr-1"></i> {{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="w-4/12 flex justify-end">
                            @can('reply-to-comment', $comment)
                                <button data-toggle="modal-reply-{{ $comment->id }}" data-target="#comment-modal-{{ $comment->id }}" class="modal-reply-{{ $comment->id }} btn btn-light btn-sm">Répondre</button>
                            @endcan
                            @can('edit-comment', $comment)
                                <button data-toggle="modal-update-{{ $comment->id }}" data-target="#comment-modal-{{ $comment->id }}" class="modal-update btn btn-green btn-sm mr-1">Éditer</button>
                            @endcan
                            @can('delete-comment', $comment)
                                <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-red btn-sm btn-link">Supprimer</a>
                                <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            @endcan
                        </div>
                    </div>

                </div>
                @can('edit-comment', $comment)
                    @component('partials.modal', [
                        'title' => 'Mettre à jour votre message',
                        'class' => 'modal-update-'.$comment->id.''
                    ])
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            @method('PUT')
                            <textarea required class="input" name="message" rows="3">{{ $comment->comment }}</textarea>
                            <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                            @slot('footer')
                                <button class="btn btn-light mr-2">Fermer</button>
                                <button type="submit" class="modal-close btn btn-blue">Mettre à jour</button>
                        </form>
                        @endslot
                    @endcomponent
                @endcan

                @can('reply-to-comment', $comment)
                    @component('partials.modal', [
                        'title' => 'Répondre au message',
                        'class' => 'modal-reply-'.$comment->id.''
                    ])
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <textarea required class="input" name="message" rows="3"></textarea>
                            <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                            @slot('footer')
                                <button class="btn btn-light mr-2">Fermer</button>
                                <button type="submit" class="modal-close btn btn-blue">Mettre à jour</button>
                        </form>
                        @endslot
                    @endcomponent
                @endcan

                {{-- Recursion for children --}}
                @if($grouped_comments->has($comment->id))
                    @foreach($grouped_comments[$comment->id] as $child)
                        @include('comments::_comment', [
                            'comment' => $child,
                            'reply' => true,
                            'grouped_comments' => $grouped_comments
                        ])
                    @endforeach
                @endif

                @if(isset($reply) && $reply === true)
            </div>
@else
@endif
