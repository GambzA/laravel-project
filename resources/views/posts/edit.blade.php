@extends('layouts.app')

@section('title', 'Updating Post')
    
@section('content')
    
<form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
    @csrf
    @method('PUT')
    @include('posts.partials.form')
    <div><input type="submit" value="update"></div>
</form>


@endsection