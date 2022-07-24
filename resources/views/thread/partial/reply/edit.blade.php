@extends('layouts.app')

@section('title', 'Edit Comment On Thread')

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
                        Publish {{ $thread->created_at->diffForhumans() }} minutes ago &middot {{ $thread->tag->name }}
                    </small>

                    <hr>
                    
                    {{-- commentar --}}

                    <div class="d-flex">
                        <div>
                            <img 
                                width="40" height="40"
                                class="rounded-circle"
                                style="object-fit: cover; object-position: center"
                                src="{{ auth()->user()->avatar() }}" 
                                alt="...">
                        </div>
                
                        <div class="flex-grow-1">                            
                            <div class="text-secondary">
                                <form action="{{ route('reply.update', [$thread, $reply]) }}" method="POST">
                                    @csrf
                                    @method('patch')
                
                                    <textarea 
                                        name="body" id="body" 
                                        class="form-control border-0 bg-transparent shadow-none"
                                        style="resize: none; margin-left: -5px;"  
                                        placeholder="Submit Your Comment..." autofocus>{{ $reply->body }}</textarea>
                                
                                    <div class="float-end">
                                        <a href="{{ route('thread.show', [$thread->tag, $thread]) }}" class="btn btn-sm btn-outline-secondary" id="batal">Cancel</a>
                                        <button type="submit" class="btn btn-primary btn-sm" id="komentari">Update Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
@endsection
