<div class="mb-4">
    <a href="{{ route('posts.show',['post_id'=>$post->id]) }}"><h3>{{ $post->title }}</h3></a>

    <div>
        <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-primary">Edit</a>
        <form class="d-inline" method="POST" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-primary">
        </form>
    </div>
</div>