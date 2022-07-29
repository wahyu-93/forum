<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('layouts.partials.navigation')
        @include('sweetalert::alert')
        
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item {{ Request::is('thread/create') ? 'active' : '' }}">
                                <a href="{{ route('thread.create') }}" class="text-black" style="text-decoration: none">New Thread</a>
                            </li>

                            <li class="list-group-item {{ request('by') == 'populer' ? 'active' : '' }}">
                                <a href="/forum/filter?by=populer" class="text-black" style="text-decoration: none">Populer</a>
                            </li>
                            
                            <li class="list-group-item {{ request('by') == 'me' ? 'active' : '' }}">
                                <a href="/forum/filter?by=me" class="text-black" style="text-decoration: none">My Threads</a>
                            </li>
                            
                            <li class="list-group-item {{ request('by') == 'answered' ? 'active' : '' }}">
                                <a href="{{ route('thread.filter', ['by' => 'answered']) }}" class="text-black" style="text-decoration: none">Answered</a>
                            </li>

                            <li class="list-group-item mb-2 {{ request('by') == 'unanswered' ? 'active' : '' }}">
                                <a href="{{ route('thread.filter', ['by' => 'unanswered']) }}" class="text-black" style="text-decoration: none">Not Yet Replies</a>
                            </li>
                            
                            <tags></tags>
                            
                          </ul>
                    </div>
        
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('script')
</body>
</html>
