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
                        src="{{ asset($thread->user->avatar()) }}" 
                        alt="...">
                </div>
            
                <div class="flex-grow-1 ms-2">
                    <h5>{{ $thread->user->name }}</h5>
                    
                    <div class="text-secondary">
                        {!! nl2br($thread->body) !!}
                    </div>

                    <small class="text-secondary">
                        Publish {{ $thread->created_at->diffForhumans() }} minutes ago &middot; <a class="text-decoration-none text-secondary" href="{{ route('tag.show', $thread->tag) }}">{{ $tag->name }}</a>
        
                        {{-- @if($thread->user_id == auth()->user()->id) 
                            &middot; <a href="{{ route('thread.edit', $thread) }}" class="text-secondary text-decoration-none">Edit</a>
                        @endif --}}

                        {{-- policy --}}
                        @can('update', $thread)
                            &middot; <a href="{{ route('thread.edit', $thread) }}" class="text-secondary text-decoration-none">Edit</a>
                        @endcan
                    </small>

                    <hr>
                    
                    
                    {{-- commentar --}}
                    @include('thread.partial.reply._create')

                    {{-- best answer --}}
                    @if($thread->answer)
                        <div class="d-flex mb-4">
                            <div>
                                <img 
                                    width="40" height="40"
                                    class="rounded-circle"
                                    style="object-fit: cover; object-position: center"
                                    src="{{ asset($thread->answer->user->avatar()) }}" 
                                    alt="...">
                            </div>
                            
                            <div class="flex-grow-1 ms-2" title="Best Answer">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5> {{ $thread->answer->user->name }} </h5>
                                    </div>
                    
                                    <div>
                                        <img src="{{ asset('assets/img/bintang.png') }}" width="20" height="20" alt="">
                                        <img src="{{ asset('assets/img/bintang.png') }}" width="20" height="20" alt="">
                                        <img src="{{ asset('assets/img/bintang.png') }}" width="20" height="20" alt="">
                                        <img src="{{ asset('assets/img/bintang.png') }}" width="20" height="20" alt="">
                                        <img src="{{ asset('assets/img/bintang.png') }}" width="20" height="20" alt="">
                                    </div>
                                </div>
                                
                                <div>
                                    {!! nl2br($thread->answer->body) !!}
                    
                                    <div>
                                        <small>
                                            <span class="text-secondary" style="font-size: 12px">Replied {{ $thread->answer->created_at->diffForhumans() }}</span>
                                        </small>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <hr>
                    @endif


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
