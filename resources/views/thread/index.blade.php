@extends('layouts.app')

@section('title', 'Forum')

@section('content')
    <div class="card">
        <div class="card-header">Forum</div>

        <div class="card-body">
            @foreach ($threads as $thread)
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img 
                            width="40" height="40"
                            class="rounded-circle"
                            style="object-fit: cover; object-position: center"
                            src="https://images.unsplash.com/photo-1609505848912-b7c3b8b4beda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjN8fHdvbWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="...">
                    </div>
                
                    <div class="flex-grow-1 ms-3">
                        <h5>{{ $thread->title }}</h5>
                        
                        <div class="text-secondary" style="text-align: justify">
                            {{ $thread->body }}
                        </div>

                        <small class="text-secondary">
                            <a href="" style="text-decoration: none;" class="text-secondary"> {{ $thread->user->name }} </a> publish {{ $thread->created_at->diffForhumans() }}
                        </small>
                    </div>
                </div>

            @endforeach
            
            {{ $threads->links() }}
            
        </div>
    </div>
@endsection
