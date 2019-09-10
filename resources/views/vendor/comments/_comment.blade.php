@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
    <div id="comment-{{ $comment->id }}" class="media">
        @else
            <li id="comment-{{ $comment->id }}" class="media">
                @endif
                <div class="bg-gray-100 shadow my-2 py-3 rounded">
                    <div class="flex">
                        <div class="w-1/12 flex items-center justify-center">
                            <img class="shadow-lg h-10 rounded-full" src="/storage/avatars/{{ auth()->user()->avatar }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
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
                                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase">Répondre</button>
                            @endcan
                            @can('edit-comment', $comment)
                                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-green btn-sm mr-1">Éditer</button>
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
                    <div class="modal fade hidden" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Comment</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="message">Update your message here:</label>
                                            <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                            <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan

                @can('reply-to-comment', $comment)
                    <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reply to Comment</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="message">Enter your message here:</label>
                                            <textarea required class="form-control" name="message" rows="3"></textarea>
                                            <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Reply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan

                <br />{{-- Margin bottom --}}

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
