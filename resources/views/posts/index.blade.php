@extends('layouts.app')

@section('title', 'Blog Post')

@section('content')
    @forelse ($posts as $key=>$post)
        {{-- <div>{{ $key }}. {{ $post['title'] }}</div> --}}
        @include('posts.partials.post')
        
    @empty
        <div>No posts</div>
    @endforelse
@endsection