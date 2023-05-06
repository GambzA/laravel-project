<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Master - @yield('title')</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-4 bg-white border-bottom shadow-sm">
        <h5 class="my-0 me-md-auto font-weight-normal">Laravel App</h5>
        <nav class="my-2 me-3">
            <a class="p-2 text-dark" href="{{route('home.index')}}">Home</a>
            <a class="p-2 text-dark" href="{{route('home.contact')}}">Contact</a>
            <a class="p-2 text-dark" href="{{route('posts.index')}}">Blog Post</a>
            <a class="p-2 text-dark" href="{{route('posts.create')}}">Add Blog Post</a>
        </nav>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>