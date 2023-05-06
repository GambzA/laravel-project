@extends('layouts.app')

@section('title', 'Updating Post')
    
@section('content')
    
<form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
    @csrf
    @method('PUT')
    @include('posts.partials.form')
    <div class="d-grid gap-2"><input type="submit" value="update" class="btn btn-primary btn-block"></div>
</form>


@endsection