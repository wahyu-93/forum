@extends('layouts.app')

@section('title', 'New Thread')

@section('content')
    <div class="card">
        <div class="card-header">New Thread</div>

        <div class="card-body">
            <form action="{{ route('thread.store') }}" method="POST">
                @include('thread.partial._form')

                <div class="form-group mb-3 float-end">
                    <a href="{{ route('thread.index') }}" class="btn btn-sm btn-outline-danger">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Post Thread</button>
                </div>
            </form>
        </div>
    </div>
@endsection
