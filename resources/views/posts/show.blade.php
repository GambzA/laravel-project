@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="content mb-5">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>Added {{ $post->created_at->diffForHumans() }}</p>
        
        @if (now()->diffInMinutes($post->created_at) < 5)
            <div class="alert alert-info">New!</div>
        @endif

    </div>

    <div class="comment">
        <h4>Comments</h4>
        @forelse ($post->comments as $comment)
            <p>{{ $comment->content }}<br/><span class="fst-italic text-muted">added {{ $comment->created_at->diffForHumans() }}</span></p>
        @empty
            <p>No comments yet!</p>
        @endforelse
    </div>
    
@endsection