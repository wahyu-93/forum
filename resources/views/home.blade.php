@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="card">
        <div class="card-header">Selamat Datang</div>

        <div class="card-body">
           Selamat Datang {{ Auth::user()->name  }}
        </div>
    </div>
@endsection
