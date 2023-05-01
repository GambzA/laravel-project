@extends('layouts.app')

@section('title', $post['title'])

@section('content')
    @if ($post['is_new'])
        <div>New Blog Post!</div>
    @elseif (!$post['is_new'])
        <div>Old Blog Post!</div>
    @endif

    @unless ($post['is_new'])
        <div>Old blog post!</div>
    @endunless

    @isset($post['has_comments'])
        <div>Has a comment</div>
    @endisset

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@endsection