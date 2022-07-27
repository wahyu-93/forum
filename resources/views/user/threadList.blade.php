@extends('layouts.app')

@section('title', 'Profile User')

@section('content')
   <div class="card mb-3">
       <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img 
                        width="40" height="40"
                        class="rounded-circle"
                        style="object-fit: cover; object-position: center"
                        src="{{ $user->avatar() }}" 
                        alt="...">
                </div>
            
                <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">
                        {{ $user->name }}
                    </h5>
                    
                   
                    <small class="text-secondary">
                        <strong>{{ $user->threads_count }} Thread</strong>
                        &middot; <strong>Joined {{ date("d M Y", strtotime($user->created_at)) }} </strong>
                    </small>
                </div>
            </div>
       </div>
   </div>

    <div class="card">
        <div class="card-header">
            <a class="text-decoration-none text-secondary" href="{{ route('thread.index') }}" >Thread List</a>
        </div>

        <div class="card-body">
            @foreach ($threads as $thread)
                <div class="d-flex mb-4">
                                    
                    <div class="flex-grow-1 ms-3">
                        <h5>
                            <a href="{{ route('thread.show', [$thread->tag, $thread]) }}" class="text-decoration-none text-black">{{ $thread->title }}</a>
                        </h5>
                        
                        <div class="text-secondary" style="text-align: justify">
                            {{ Str::limit($thread->body, 170) }}
                        </div>

                        <small class="text-secondary">
                            <a href="{{ route('thread.filter.user', $thread->user) }}" style="text-decoration: none;" class="text-secondary"> {{ $thread->user->name }} </a> publish {{ $thread->created_at->diffForhumans() }}
                            &middot; {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }}
                        </small>
                        
                        <div class="mt-1">
                            <small class="border border-1 rounded p-1"><a class="text-decoration-none text-secondary" href="{{ route('tag.show', $thread->tag) }}"> {{ $thread->tag->name }}</a></small>
                        </div>
                        
                    </div>
                </div>

            @endforeach

            @isset($query)
                {{ $threads->appends(['by' => $query])->links() }}
            @else
                {{ $threads->links() }}
            @endisset
            
            
        </div>
    </div>
@endsection
