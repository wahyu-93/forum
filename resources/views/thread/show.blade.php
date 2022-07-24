@extends('layouts.app')

@section('title', 'Show Thread')

@section('content')
    <div class="card">
        <div class="card-header">{{ $thread->title }}</div>

        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img 
                        width="40" height="40"
                        class="rounded-circle"
                        style="object-fit: cover; object-position: center"
                        src="{{ $thread->user->avatar() }}" 
                        alt="...">
                </div>
            
                <div class="flex-grow-1 ms-2">
                    <h5>{{ $thread->user->name }}</h5>
                    
                    <div class="text-secondary">
                        {!! nl2br($thread->body) !!}
                    </div>

                    <small class="text-secondary">
                        Publish {{ $thread->created_at->diffForhumans() }} minutes ago &middot; {{ $tag->name }}
        
                        @if($thread->user_id == auth()->user()->id) 
                            &middot; <a href="{{ route('thread.edit', $thread) }}" class="text-secondary text-decoration-none">Edit</a>
                        @endif
                    </small>

                    <hr>
                    
                    {{-- commentar --}}
                    @include('thread.partial.reply._create')

                    @include('thread.partial.reply._index')
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function show(params, event)
            {
                event.preventDefault()
                let batal = document.getElementById('batal')
                let komentari = document.getElementById('komentari')
                let comment = document.getElementById('comment')

                batal.style.display = params
                komentari.style.display = params
                comment.value = ''

                console.log(batal)
            }
        </script>
    @endpush
@endsection
