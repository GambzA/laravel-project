
<div class="form-group mb-3">
    <label for="title" class="form-label">Title</label>
    <input id="title" type="text" name="title" class="form-control bg-white" value={{ old('title', $post->title ?? null) }}>
</div>
@error('title')
    <div calss="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control bg-white" id="content">{{ old('content', $post->content ?? null) }}</textarea>
</div>
@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif