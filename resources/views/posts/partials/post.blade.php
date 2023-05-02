<div>
    <form method="POST" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="delete">
    </form>
</div>