@extends('layouts.app')

@section('title', 'Show Thread')

@section('content')
    <div class="card">
        <div class="card-header">Judul thread</div>

        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img 
                        width="40" height="40"
                        class="rounded-circle"
                        style="object-fit: cover; object-position: center"
                        src="https://images.unsplash.com/photo-1609505848912-b7c3b8b4beda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjN8fHdvbWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="...">
                </div>
            
                <div class="flex-grow-1 ms-3">
                    <h5>Wahyudi</h5>
                    
                    <div class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti autem eligendi nihil voluptatum! Sapiente eligendi a ullam autem eveniet dolorem natus doloribus nam asperiores incidunt, rerum nostrum? Ea deleniti esse id nisi impedit eligendi beatae qui dolore quasi culpa laborum unde, excepturi officia tempore? Dolore quia ipsa laborum dicta quo.
                    </div>

                    <small class="text-secondary">
                        <a href="" style="text-decoration: none;" class="text-secondary"> Wahyudi </a> publish 2 minutes ago
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
