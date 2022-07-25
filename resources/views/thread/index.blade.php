@extends('layouts.app')

@section('title', 'Forum')

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="text-decoration-none text-secondary" href="{{ route('thread.index') }}" >Forum</a>
            @isset($tag)
                <span>/ <a class="text-decoration-none text-secondary"> {{ $tag->name }}</span>
            @endisset

        </div>

        <div class="card-body">
            @foreach ($threads as $thread)
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
                        </small>
                        
                        <div class="mt-1">
                            <small class="border border-1 rounded p-1"><a class="text-decoration-none text-secondary" href="{{ route('tag.show', $thread->tag) }}"> {{ $thread->tag->name }}</a></small>
                        </div>
                        
                    </div>
                </div>

            @endforeach
            
            {{ $threads->links() }}
            
        </div>
    </div>
@endsection
