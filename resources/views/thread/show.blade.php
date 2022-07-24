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
                        Publish {{ $thread->created_at->diffForhumans() }} minutes ago
                    </small>

                    <hr>
                    
                    {{-- commentar --}}
                    @auth
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
                                    <form action="" method="POST">
                                        <textarea 
                                            name="comment" id="comment" 
                                            class="form-control border-0 bg-transparent shadow-none"
                                            style="resize: none; margin-left: -5px;"  
                                            onclick="show('inline', event)"
                                            placeholder="Write Your Comment..."></textarea>
                                    
                                        <div class="float-end">
                                            <button class="btn btn-sm btn-outline-secondary" id="batal" style="display: none;" onclick="show('none',event)">Cancel</button>
                                            <button class="btn btn-primary btn-sm" id="komentari" style="display: none;">Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>                        
                        </div>
                    @endauth

                    @guest
                        <h5>Please <a href="{{ route('login') }}">Login</a> Before Comment</h5>    
                    @endguest

                    <hr>

                    <div class="d-flex">
                        <div>
                            <img 
                                width="40" height="40"
                                class="rounded-circle"
                                style="object-fit: cover; object-position: center"
                                src="https://images.unsplash.com/photo-1609505848912-b7c3b8b4beda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjN8fHdvbWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="...">
                        </div>
                        
                        <div class="flex-grow-1 ms-2">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>Wahyudi 
                                        <span class="text-secondary" style="font-size: 12px">2 minutes ago</span>
                                    </h5>
                                </div>

                                <div>
                                    <span class="text-success">Mars as answer</span>
                                </div>
                            </div>
                            
                            <div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti autem eligendi nihil voluptatum! Sapiente eligendi a ullam autem eveniet dolorem natus doloribus nam asperiores incidunt, rerum nostrum? Ea deleniti esse id nisi impedit eligendi beatae qui dolore quasi culpa laborum unde, excepturi officia tempore? Dolore quia ipsa laborum dicta quo.
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex">
                        <div>
                            <img 
                                width="40" height="40"
                                class="rounded-circle"
                                style="object-fit: cover; object-position: center"
                                src="https://images.unsplash.com/photo-1658351984158-e9e63932d220?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyM3x8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60" alt="...">
                        </div>
                        
                        <div class="flex-grow-1 ms-2">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>Muhammad Hanif Al Fatih 
                                        <span class="text-secondary" style="font-size: 12px">10 minutes ago</span>
                                    </h5>
                                </div>

                                <div>
                                    <span class="text-success">Mars as answer</span>
                                </div>
                            </div>
                            
                            <div>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, saepe.
                            </div>
                        </div>
                    </div>
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
