@forelse ($replies as $reply)
    <div class="d-flex mb-4">
        <div>
            <img 
                width="40" height="40"
                class="rounded-circle"
                style="object-fit: cover; object-position: center"
                src="{{ $reply->user->avatar() }}" 
                alt="...">
        </div>
        
        <div class="flex-grow-1 ms-2">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>{{ $reply->user->name }} </h5>
                </div>

                <div>
                    @can('update', $thread)
                        <a 
                            href="{{ route('mark.answer.store', $reply) }}" 
                            class="text-success text-decoration-none"
                            onclick="event.preventDefault(); getElementById('mark-answer-{{ $reply->hash }}').submit();">&middot; Mark as answer</a>

                        <form action="{{ route('mark.answer.store', $reply) }}" method="POST" id="mark-answer-{{ $reply->hash }}" style="display: none">
                            @csrf
                            @method('patch')
                        </form>
                    @endcan
                </div>
            </div>
            
            <div>
                {!! nl2br($reply->body) !!}

                <div>
                    <small>
                        <span class="text-secondary" style="font-size: 12px">Replied {{ $reply->created_at->diffForhumans() }}</span>
                        
                        {{-- @if($reply->user_id == auth()->user()->id)
                            <span>&middot; <a href="{{ route('reply.edit', [$thread, $reply]) }}" class="text-secondary text-decoration-none" style="font-size: 12px">Edit</a></span>
                        @endif --}}

                        @can('update', $reply)
                            <span>&middot; <a href="{{ route('reply.edit', [$thread, $reply]) }}" class="text-secondary text-decoration-none" style="font-size: 12px">Edit</a></span>
                        @endcan
                    </small>
                </div>
            </div>
            
        </div>
    </div>
@empty
    <p class="text-center text-secondary fs-5">No Comments On This Thread !</p>
@endforelse