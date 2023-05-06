@extends('layouts.app')

@section('title', 'Creating Post')
    
@section('content')
    
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts.partials.form')
    <div class="d-grid gap-2">
        <input type="submit" value="Submit" class="btn btn-primary btn-block">
    </div>
</form>


@endsection