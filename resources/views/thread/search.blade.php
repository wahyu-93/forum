@extends('layouts.app')

@section('title', 'Forum')

@section('content')
    <form action="{{ route('thread.search') }}" method="GET" class="mb-2" autocomplete="off">
        <input type="search" name="query" class="form-control" placeholder="Search Thread . . .">
    </form>

    <div class="card">
        <div class="card-header">
            <a class="text-decoration-none text-secondary" href="{{ route('thread.index') }}" >Forum</a>
            @isset($tag)
                <span>/ <a class="text-decoration-none text-secondary"> {{ $tag->name }}</span>
            @endisset

        </div>

        <div class="card-body">
            @forelse ($threads as $thread)
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img 
                            width="40" height="40"
                            class="rounded-circle"
                            style="object-fit: cover; object-position: center"
                            src="{{ $thread->user->avatar() }}" 
                            alt="...">
                    </div>
                
                    <div class="flex-grow-1 ms-3">
                        <h5>
                            <a href="{{ route('thread.show', [$thread->tag, $thread]) }}" class="text-decoration-none text-black">{{ $thread->title }}</a>
                        </h5>
                        
                        <div class="text-secondary" style="text-align: justify">
                            {{ Str::limit($thread->body, 170) }}
                        </div>

                        <small class="text-secondary">
                            <a href="" style="text-decoration: none;" class="text-secondary"> {{ $thread->user->name }} </a> publish {{ $thread->created_at->diffForhumans() }}
                            &middot; {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }}
                        </small>
                        
                        <div class="mt-1">
                            <small class="border border-1 rounded p-1"><a class="text-decoration-none text-secondary" href="{{ route('tag.show', $thread->tag) }}"> {{ $thread->tag->name }}</a></small>
                        </div>
                        
                    </div>
                </div>

            @empty
                <p class="mb-0">We can not find what are your looing for . . . <a href="{{ route('thread.index') }}">Browse threads</a></p>    
            @endforelse
            
            {{ $threads->links() }}
            
        </div>
    </div>
@endsection
