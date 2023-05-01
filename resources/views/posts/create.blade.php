@extends('layouts.app')

@section('titel', 'Creating Post')
    
@section('content')
    
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div><input type="text" name="title"></div>
    <div><textarea name="content"></textarea></div>
    <div><input type="submit" value="submit"></div>
</form>


@endsection