@extends('layouts.app')

@section('title', 'Creating Post')
    
@section('content')
    
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts.partials.form')
    <div><input type="submit" value="submit"></div>
</form>


@endsection