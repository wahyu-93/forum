@extends('layouts.app')

@section('title', 'Edit Thread')

@section('content')
    <div class="card">
        <div class="card-header">Edit Thread</div>

        <div class="card-body">
            <form action="{{ route('thread.update', $thread) }}" method="POST">
                @method('PATCH')
                
                @include('thread.partial._form')

                <div class="form-group mb-3 float-end">
                    <a href="{{ route('thread.show', [$thread->tag, $thread]) }}" class="btn btn-sm btn-outline-danger">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update Thread</button>
                </div>
            </form>
        </div>
    </div>
@endsection
