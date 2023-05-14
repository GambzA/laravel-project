<div class="mb-4">

    <a href="{{ route('posts.show',['post'=>$post->id]) }}"><h3>{{ $post->title }}</h3></a>

    <div class="mb-1">
        <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-primary">Edit</a>
        <form class="d-inline" method="POST" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-primary">
        </form>
    </div>

    @if ($post->comments_count > 0)
        <div>Number of comments: {{ $post['comments_count'] }}</div>
    @else 
        <div>No Comments Yet</div>
    @endif
    

</div>