@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="card">
        <div class="card-header">Edit Profile</div>

        <div class="card-body">
            <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group mb-3">
                    <img src="{{ asset(auth()->user()->avatar()) }}" alt="" width="250" height="250" class="mb-3 d-block rounded-circle" id="preview">
                    
                    <label for="avatar" class="d-block">Upload Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control-file" accept="image/*" onchange="loadFile(event)">
                    
                    @error('avatar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="@johndoe" value="{{ old('username') ?? auth()->user()->username }}">

                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? auth()->user()->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-secondary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script>
           function loadFile(event)
           {
               let preview = document.getElementById('preview')

               preview.src = URL.createObjectURL(event.target.files[0])
           }
        </script>
        
    @endpush
@endsection
